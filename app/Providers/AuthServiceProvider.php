<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\ReplyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-comment', function(User $user, Comment $comment){
            return $user->id === $comment->user_id;
        });

        Gate::define('edit-reply', function(User $user, Reply $reply){
            return $user->id === $reply->user_id;
        });

        Gate::define('update-reply', function(Reply $reply, Comment $comment){
            return $reply->comment_id === $comment->id;
        });
    }
}
