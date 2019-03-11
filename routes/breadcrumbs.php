<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('services', function ($trail) {
    $trail->push('Services', route('service.index'));
});


Breadcrumbs::for('services.create', function ($trail) {
    $trail->parent('services');
    $trail->push('New Service', route('service.create'));
});


Breadcrumbs::for('deliveries', function ($trail) {
    $trail->push('Deliveries', route('delivery.index'));
});

Breadcrumbs::for('deliveries.create', function ($trail) {
    $trail->parent('deliveries');
    $trail->push('New Delivery', route('delivery.create'));
});

