<?php


namespace App\Services;


use App\Club;
use App\Traits\ImageTrait;
use App\User;
use Illuminate\Support\Facades\DB;

class ClubService
{
    use ImageTrait;

    private $logoDirectory = 'clubs/logo/';

    public function findAll(int $maxPerPage)
    {
        return Club::query()->latest()->paginate($maxPerPage);
    }

    public function store(array $attributes): Club
    {
        $club = null;

        DB::transaction(function () use ($attributes, &$club) {
            $attributes['logo'] = $this->storeImage(
                $attributes['logo'],
                $this->logoDirectory,
                $attributes['domain']);

            $club = Club::query()->create($attributes);

            $club->users()->save(User::query()->find($club->president_id));
        });

        return $club;
    }

    public function update(Club $club, array $attributes): void
    {
        if (array_key_exists('logo', $attributes)) {
            $this->deleteImage($club->logo);

            $attributes['logo'] = $this->storeImage(
                $attributes['logo'],
                $this->logoDirectory,
                $attributes['domain']);
        }

        DB::transaction(function () use ($attributes, &$updatedClub, $club) {
            $club->users()->detach($club->president_id);

            $club->update($attributes);

            $club->users()->save(User::query()->find($club->president_id));
        });
    }

    public function delete(Club $club): bool
    {
        try {
            $logoPath = $club->logo;

            DB::transaction(function () use ($club) {
                $club->users()->detach($club->president_id);
                $club->delete();
            });

            $this->deleteImage($logoPath);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
