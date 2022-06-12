<?php

namespace App\Policies;

use App\Models\User;
use App\Models\tahun_akademik;
use Illuminate\Auth\Access\HandlesAuthorization;

class TahunAkademikPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tahun_akademik  $tahunAkademik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, tahun_akademik $tahunAkademik)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tahun_akademik  $tahunAkademik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, tahun_akademik $tahunAkademik)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tahun_akademik  $tahunAkademik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, tahun_akademik $tahunAkademik)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tahun_akademik  $tahunAkademik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, tahun_akademik $tahunAkademik)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\tahun_akademik  $tahunAkademik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, tahun_akademik $tahunAkademik)
    {
        //
    }
}
