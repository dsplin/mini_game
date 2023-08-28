<?php

namespace App\Http\Controllers;

use App\Services\UniqueLinkService;
use App\Services\GameService;


class PageAController extends Controller
{
    protected $uniqueLinkService;
    protected $gameService;

    public function __construct(UniqueLinkService $uniqueLinkService, GameService $gameService)
    {
        $this->uniqueLinkService = $uniqueLinkService;
        $this->gameService = $gameService;
    }

    public function showPageA($link)
    {
        $uniqueLink = $this->uniqueLinkService->getUniqueLinkByLink($link);

        if (is_null($uniqueLink)) {
            return abort(404);
        }

        return view('page_a', ['link' => $uniqueLink->link]);
    }

    public function updateLink($link)
    {
        $updatedLink = $this->uniqueLinkService->updateUniqueLink($link);

        if (isset($updatedLink)) {
            return redirect()->route('page.a', ['link' => $updatedLink->link])->with('success', 'Link updated.');
        } else {
            return abort(404);
        }
    }

    public function deleteLink($link)
    {
        if ($this->uniqueLinkService->deleteUniqueLink($link)) {
            return redirect()->route('registration.form')->with('success', 'Link deactivated.');
        } else {
            return abort(404);
        }
    }

    public function playGame($link)
    {
        $uniqueLink = $this->uniqueLinkService->getUniqueLinkByLink($link);

        if (is_null($uniqueLink)) {
            return abort(404);
        }

        $gameData = $this->gameService->playGame($uniqueLink);

        return redirect()->route('page.a', ['link' => $link])
            ->with($gameData);
    }

    public function gameHistory($link)
    {
        $uniqueLink = $this->uniqueLinkService->getUniqueLinkByLink($link);

        if (is_null($uniqueLink)) {
            return abort(404);
        }

        $gameHistory = $this->gameService->getGameHistory($uniqueLink);

        return view('history', ['gameHistory' => $gameHistory, 'link' => $link]);
    }
}
