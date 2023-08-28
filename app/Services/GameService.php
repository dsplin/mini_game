<?php

namespace App\Services;

use App\Models\UniqueLink;
use App\Models\GameResult;

class GameService
{
    public function playGame(UniqueLink $uniqueLink)
    {
        $randomNumber = rand(1, 1000);
        $result = $randomNumber % 2 === 0 ? 'Win' : 'Lose';

        if ($result == 'Lose') {
            $winAmount = 0;
        } elseif ($randomNumber > 900) {
            $winAmount = $randomNumber * 0.7;
        } elseif ($randomNumber > 600) {
            $winAmount = $randomNumber * 0.5;
        } elseif ($randomNumber > 300) {
            $winAmount = $randomNumber * 0.3;
        } else {
            $winAmount = $randomNumber * 0.1;
        }

        $gameResult = new GameResult([
            'user_id' => $uniqueLink->user_id,
            'random_number' => $randomNumber,
            'result' => $result,
            'win_amount' => $winAmount,
        ]);
        $gameResult->save();

        return [
            'randomNumber' => $randomNumber,
            'result' => $result,
            'winAmount' => $winAmount,
        ];
    }

    public function getGameHistory(UniqueLink $uniqueLink)
    {
        $gameHistory = GameResult::where('user_id', $uniqueLink->user_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return $gameHistory;
    }
}
