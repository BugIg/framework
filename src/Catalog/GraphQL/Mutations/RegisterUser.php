<?php

namespace AvoRed\Framework\Catalog\GraphQL\Mutations;

use AvoRed\Framework\User\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Laminas\Diactoros\ServerRequest;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterUser
{
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
        $data = [];
        $user = $this->getUser($args);
        $client = $user->getPassportClient();
        
    
        if (null !== $client && $client instanceof Client) {
           
            $serverRequest = $this->createRequest($client, $user->id, $args, $scope = []);
            $reponse = app(AccessTokenController::class)->issueToken($serverRequest);
            $data = json_decode($reponse->content(), true);
            
            $user->token_type = $data['token_type'];
            $user->expires_in = $data['expires_in'];
            $user->access_token = $data['access_token'];
            $user->refresh_token = $data['refresh_token'];
           
           
            return $user;
        }

       
        
        return null;
    }

     /**
     * Create a request instance for the given client.
     *
     * @param  \Laravel\Passport\Client  $client
     * @param  mixed  $userId
     * @param  array  $scopes
     * @return \Zend\Diactoros\ServerRequest
     */
    protected function createRequest($client, $userId, $data, array $scopes)
    {
        return (new ServerRequest)->withParsedBody([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $data['email'],
            'password' => $data['password'],
            'user_id' => $userId,
            'scope' => implode(' ', $scopes),
        ]);
    }
    /**
     *
     * @param array $data
     * @return User $user
     */
    protected function getUser($data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
