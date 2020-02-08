<?php
namespace AvoRed\Framework\Graphql\Queries\Admin\Catalog\Property;

use AvoRed\Framework\Database\Contracts\PropertyModelInterface;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PropertyTableQuery extends Query
{
    protected $attributes = [
        'name' => 'adminPropertyTable',
        'description' => 'A query'
    ];

    /**
     * Property Repository
     * @var AvoRed\Framework\Database\Repository\PropertyRepository
     */
    protected $propertyRepository;

    /**
     * All Property construct
     * @param \AvoRed\Framework\Database\Contracts\PropertyModelInterface $propertyRepository
     * @return void
     */
    public function __construct(PropertyModelInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Return type for these query
     * @return \GraphQL\Type\Definition\Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('property'));
    }

    /**
     * Passed arguments for this query
     * @return array
     */
    public function args(): array
    {
        return [];
    }

    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        return Auth::guard('admin_api')->check();
    }

    /**
     * Resolve Query to get pass an information
     * @param mixed $root
     * @param array $args
     * @param mixed $context
     * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo
     * @param midex $getSelectFields
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields): Collection
    {
        return $this->propertyRepository->all();
    }
}
