<?php

namespace App\Observers;

use Elasticsearch\Client as Elasticsearch;

class ElasticsearchObserver
{
    private $elasticearch;

    public function __construct(Elasticsearch $elasticearch)
    {
        $this->elasticearch = $elasticearch;
    }

    public function save($model)
    {
        $this->elasticearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
            'body' => $model->toSearchArray(),
        ]);
    }

    public function deleted($model)
    {
        $this->elasticearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
        ]);
    }
}
