<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json' ));
    $horizontalMenuData = json_decode($horizontalMenuJson);
    $agent_verticalMenuJson = file_get_contents(base_path('resources/menu/agent_verticalMenu.json'));
    $agent_verticalMenuData = json_decode($agent_verticalMenuJson);

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
    \View::share('agent_menuData', [$agent_verticalMenuData]);
  }
}
