<?php

namespace App\Articles;

interface ArticlesRepository
{
    public function search($query = "");
}