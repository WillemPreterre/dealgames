
<?php declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void
{
    $configurator->extension('knp_paginator', [
        'page_range' => 5,                        // number of links shown in the pagination menu (e.g: you have 10 pages, a page_range of 3, on the 5th page you'll see links
        'default_options' => [
            'page_name' => 'page',                // page query parameter name
            'sort_field_name' => 'sort',          // sort field query parameter name
            'sort_direction_name' => 'direction', // sort direction query parameter name
            'distinct' => true,                   // ensure distinct results, useful when ORM queries are using GROUP BY statements
            'filter_field_name' => 'filterField', // filter field query parameter name
            'filter_value_name' => 'filterValue'  // filter value query parameter name
        ],
        'template' => [
            'pagination' => '@KnpPaginator/Pagination/sliding.html.twig',     // sliding pagination controls template
            'sortable' => '@KnpPaginator/Pagination/sortable_link.html.twig', // sort link template
            'filtration' => '@KnpPaginator/Pagination/filtration.html.twig',   // filters template
            'bootstrap' => '@KnpPaginator/Pagination/bootstrap_v5_pagination.html.twig'
        ]
    ]);
};