<?php
namespace AvoRed\Framework\Graphql\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PropertyType extends GraphQLType
{
    /**
     * Attribute for Property Type
     * @var array
     */
    protected $attributes = [
        'name' => 'Property',
        'description' => 'A type'
    ];

     /**
     * Fields for Property Type
     * @return array $fields
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Property Id'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Property Name'
            ],
            'slug' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Property Slug'
            ],
            'data_type' => [
                'type' => Type::string(),
                'description' => 'Property Data Type'
            ],
            'field_type' => [
                'type' => Type::string(),
                'description' => 'Property Field Type'
            ],
            'use_for_all_products' => [
                'type' => Type::boolean(),
                'description' => 'Is Property field used for all types of products?'
            ],
            'use_for_category_filter' => [
                'type' => Type::boolean(),
                'description' => 'Is Property field used for category filter at category page?'
            ],
            'is_visible_frontend' => [
                'type' => Type::boolean(),
                'description' => 'Is Property field is visible at frontend?'
            ],
            'sort_order' => [
                'type' => Type::int(),
                'description' => 'Property field sort order'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Property created at'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Property updated at'
            ]
        ];
    }
}
