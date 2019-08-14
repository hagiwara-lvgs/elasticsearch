{% raw %}
<html>
    <head>
        <title>Articles</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Articles <small>({{ $articles->count() }})</small>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="container">
                                <form action="{{ url('search') }}" method="get">
                                    <div class="form-group">
                                        <input type="text" 
                                            name="q" 
                                            class="form-control" 
                                            placeholder="Search..." 
                                            value="{{ request('q') }}">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="container">
                                @forelse ($articles as $article)
                                    <article>
                                        <h2>{{ $article->title }}</h2>
        
                                        <p>{{ $article->body }}</body>
        
                                        <p class="well">{{ implode(', ', $article->tags ?: []) }}</p>
                                    </article>
                                @empty
                                    <p>No articles found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
{% endraw %}
