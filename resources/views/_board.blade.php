<div class="col-sm-12" id="p{{$player}}" style="display: none">
    Player {{$player}}: <span class="p{{$player}}">{{ $player == 1 ? $game->getPlayerOne() : $game->getPlayerTwo() }}</span>
<table class="table table-bordered">
    @for($i=0; $i<=10; $i++)
    <tr>
        @for($j=0; $j<=10; $j++)
        <td style="width: 35px;"  data-i='{{$i}}' data-j='{{$j}}' class="
            @if($j == 0 || $i == 0)
            frame
            @elseif($player == 1 ? $game->getPlayerOneShips()->isHit([$i, $j]) : $game->getPlayerTwoShips()->isHit([$i, $j]))
             hit
            @elseif($player == 1 ? $game->getPlayerOneShips()->isMissedHit([$i, $j]) : $game->getPlayerTwoShips()->isMissedHit([$i, $j]))
             miss
            @else
             out
            @endif">
            @if($i == 0 && $j > 0)
            {{ $j }}
            @elseif($j==0 && $i > 0)
            {{ $i }}
            @elseif($name = $player == 1 ? $game->getPlayerOneShips()->isMatch([$i, $j]) : $game->getPlayerTwoShips()->isMatch([$i, $j]))
            <!-- {{$name[0]}}  -->
            @endif
        </td>
        @endfor
    </tr>
    @endfor
</table>
</div>