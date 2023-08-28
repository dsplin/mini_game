<?php

namespace App\Services;

use App\Models\UniqueLink;

class UniqueLinkService
{
    public function getUniqueLinkByLink($link)
    {
        $uniqueLink = UniqueLink::where('link', $link)->first();
        return  (isset($uniqueLink) && $uniqueLink->expiration_date >= now()) ? $uniqueLink : null;
    }

    public function createUniqueLink($userId)
    {
        $uniqueLink = new UniqueLink([
            'user_id' => $userId,
            'link' => uniqid(),
            'expiration_date' => now()->addDays(7),
        ]);
        $uniqueLink->save();

        return $uniqueLink;
    }

    public function updateUniqueLink($link)
    {
        $uniqueLink = UniqueLink::where('link', $link)->first();

        if (isset($uniqueLink)) {
            $uniqueLink->update([
                'link' => uniqid(),
                'expiration_date' => now()->addDays(7),
            ]);

            return $uniqueLink;
        }

        return null;
    }

    public function deleteUniqueLink($link)
    {
        $uniqueLink = UniqueLink::where('link', $link)->first();

        if (isset($uniqueLink)) {
            $uniqueLink->delete();
            return true;
        }

        return false;
    }

}
