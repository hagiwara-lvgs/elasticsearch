<?php

namespace App\Articles;

use App\Article;
use Elasticsearch\Client as Elasticsearch;

class ElasticsearchArticlesRepository implements ArticlesRepository
{
    private $search;

    public function __construct(Elasticsearch $search)
    {
        $this->search = $search;
    }

    public function search($query = "")
    {
        $items = $this->searchOnElasticsearch($query);
        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch($query)
    {
        $instance = new Article();
        $items = $this->search->search([
            'index' => $instance->getSearchIndex(),
            'type' => $instance->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title', 'body', 'tags'],
                        'query' => $query,
                    ]
                ]
            ]
        ]);
        return $items;
    }

    private function buildCollection($items)
    {
        $hits = array_pluck($items['hits']['hits'], '_source') ?: [];
        $sources = array_map(function ($source) {
            $source['tags'] = json_encode($source['tags']);
            return $source;
        }, $hits);
        return Article::hydrate($sources);
    }
}