<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
// This is the base controller for the application, which includes traits for authorization, job dispatching, and validation.
// It extends the BaseController from Laravel's routing system, allowing it to handle requests and responses
// effectively. The traits included provide a clean way to manage permissions, dispatch jobs, and validate requests
// throughout the application, ensuring that the controller can perform these common tasks without needing to
// implement them manually in every controller that extends it.