<?php

namespace App\Services;

use App\Models\Support\Role;
use App\Models\User;

class SearchService
{
    public function baseUserSearchQuery()
    {
        return User::query();
    }

    // public function getUsersWithDynamicRelations(array $relations, array $aggregates = [])
    // {
    //     $query = $this->baseUserSearchQuery();

    //     if (!empty($relations)) {
    //         $query->with($relations);
    //     }

    //     foreach ($aggregates as $aggregate) {
    //         $query->withCount($aggregate);
    //     }

    //     return $query->get();
    // }

    public function searchStudentsWithCountedWarnings(int $dni)
    {
        return $this
            ->baseUserSearchQuery()
            ->ofRole(Role::STUDENT)
            ->search($dni)
            ->with('studentCourse')
            ->withCount('studentWarnings')
            ->get();
    }
}