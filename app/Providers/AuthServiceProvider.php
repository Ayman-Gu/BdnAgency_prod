<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Team::class              => \App\Policies\TeamPolicy::class,
        \App\Models\Blog::class              => \App\Policies\BlogPolicy::class,
        \App\Models\ContactInfo::class       => \App\Policies\ContactInfoPolicy::class,
        \App\Models\Newsletter::class        => \App\Policies\NewsletterSubscriberPolicy::class,
        \App\Models\Faq::class               => \App\Policies\FaqPolicy::class,
        \App\Models\Project::class           => \App\Policies\ProjectPolicy::class,
        \App\Models\Testimonial::class       => \App\Policies\TestimonialPolicy::class,
        \App\Models\PdfFile::class           => \App\Policies\PdfFilePolicy::class,
        \App\Models\User::class              => \App\Policies\UserPolicy::class,
        \App\Models\Role::class              => \App\Policies\RolePolicy::class,
        \App\Models\Permission::class        => \App\Policies\PermissionPolicy::class,    
        \App\Models\Service::class           => \App\Policies\ServicePolicy::class,


        /*for dashboard/index page*/
        \App\Models\Home::class              => \App\Policies\HomePolicy::class,
        \App\Models\ServiceBdd::class        => \App\Policies\ServiceBddPolicy::class,
        \App\Models\ServiceEmailing::class   => \App\Policies\ServiceEmailingPolicy::class,
        \App\Models\ServiceSms::class        => \App\Policies\ServiceSmsPolicy::class,
        \App\Models\ServiceNewsletter::class => \App\Policies\ServiceNewsletterPolicy::class,
        \App\Models\ServiceBranding::class   => \App\Policies\ServiceBrandingPolicy::class,
        \App\Models\ServiceVisionnaire::class=> \App\Policies\ServiceVisionnairePolicy::class,
        \App\Models\AproposPage::class       => \App\Policies\AproposPagePolicy::class,
    ];

    public function boot()
{
    $this->registerPolicies();

    Gate::define('manage-pages', function ($user, $model) {
        return $user->hasPermissionTo('pages.manage');
    });
}
}
