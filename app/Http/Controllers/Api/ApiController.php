<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * SWAGGER DOCS
 * @OA\Info(
 *     version="1.0",
 *     title="OpenAPI Documentation",
 * )
 *
 * @OA\Parameter(
 *      parameter="queryset--page",
 *      in="query",
 *      name="page",
 *      required=false,
 *      description="Page number *(Default: 1)*",
 *      @OA\Schema(
 *          type="integer"
 *      )
 * )
 * 
 * @OA\Parameter(
 *      parameter="queryset--length",
 *      in="query",
 *      name="length",
 *      required=false,
 *      description="Length of items per page *(Default: 15)*",
 *      @OA\Schema(
 *          type="integer"
 *      )
 * )
 * 
 * @OA\Parameter(
 *      parameter="queryset--search_query",
 *      in="query",
 *      name="search_query",
 *      required=false,
 *      description="Search query to apply for models",
 *      @OA\Schema(
 *          type="string"
 *      )
 * )
 * 
 * @OA\Parameter(
 *      parameter="queryset--order_by",
 *      in="query",
 *      name="order_by",
 *      required=false,
 *      example="created_at",
 *      description="Order by model field",
 *      @OA\Schema(
 *          type="string"
 *      )
 * )
 * 
 * @OA\Parameter(
 *      parameter="queryset--order_dir",
 *      in="query",
 *      name="order_dir",
 *      required=false,
 *      description="Direction for ordering",
 *      @OA\Examples(example="asc", value="asc", summary="ASC ordering"),
 *      @OA\Examples(example="desc", value="desc", summary="DESC ordering"),
 *      @OA\Schema(
 *          type="string",
 *      )
 * )
 * 
 * @OA\Parameter(
 *      parameter="queryset--model_type",
 *      in="query",
 *      name="model_type",
 *      required=true,
 *      description="Model type for polymorphic relationship",
 *      @OA\Examples(example="Post", value="post", summary="Morph to Post model"),
 *      @OA\Examples(example="Campaign", value="campaign", summary="Morph to Campaign model"),
 *      @OA\Schema(
 *          type="string",
 *      )
 * )
 */

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
