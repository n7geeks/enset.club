<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use RomegaDigital\Multitenancy\Contracts\Tenant as TenantContract;
use RomegaDigital\Multitenancy\Exceptions\TenantDoesNotExist;

class Club extends Model implements TenantContract
{
    protected $fillable = [
        'name',
        'slogan',
        'description',
        'logo',
        'email',
        'phone_number',
        'president_id',
        'domain',
    ];

    /**
     * Create new Tenant instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('multitenancy.table_names.tenants'));
    }

    /**
     * Find a Tenant by its domain.
     *
     * @param string $domain
     *
     * @return \RomegaDigital\Multitenancy\Contracts\Tenant
     * @throws \RomegaDigital\Multitenancy\Exceptions\TenantDoesNotExist
     *
     */
    public static function findByDomain(string $domain): TenantContract
    {
        $tenant = static::where(['domain' => $domain])->first();

        if (!$tenant) {
            throw TenantDoesNotExist::forDomain($domain);
        }

        return $tenant;
    }

    public function getLogoUrlAttribute()
    {
        return url($this->logo);
    }

    public function getFullDomainAttribute()
    {
        return 'http://' . $this->domain . '.' . env('MULTITENANCY_BASE_URL');
    }

    /**
     * A Tenant belongs to many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(config('multitenancy.user_model'))
            ->withTimestamps();
    }

    /**
     * Every club has one president
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function president()
    {
        return $this->belongsTo(User::class);
    }
}
