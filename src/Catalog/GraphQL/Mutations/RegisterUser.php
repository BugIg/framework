<?php

namespace AvoRed\Framework\Catalog\GraphQL\Mutations;

use AvoRed\Framework\Catalog\GraphQL\Traits\AuthTrait;
use AvoRed\Framework\User\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Laravel\Passport\Client;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterUser
{
    use AuthTrait;
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = $this->getUser($args);
        $client = $user->getPassportClient();  
    
        if (null !== $client && $client instanceof Client) {
            $user = $this->validateUser($client, $user, $args);   
            return $user;
        }
        
        return null;
    }

    /**
     * Creat the User based on Given Data and Return the Model
     * @param array $data
     * @return User $user
     */
    protected function getUser($data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
