<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <title>Battle Ship</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
				<h1>Battle Ship</h1>
				<div class="col-sm-6">
					Player 1: {{ $p1 }}
                                        <table class="table table-bordered">
					@for($i=0; $i<=10; $i++)
                                        <tr>
                                            @for($j=0; $j<=10; $j++)
                                            <td style="width: 35px">
                                                @if($i == 0 && $j > 0)
                                                {{ $j }}
                                                @elseif($j==0 && $i > 0)
                                                {{ $i }}
                                                @endif
                                            </td>
                                            @endfor
                                        </tr>
					@endfor
					</table>
				</div>
				<div class="col-sm-6">
					Player 2: {{ $p2}}
                                        <table class="table table-bordered">
					@for($i=0; $i<=10; $i++)
                                        <tr>
                                            @for($j=0; $j<=10; $j++)
                                            <td style="width: 35px">
                                                @if($i == 0 && $j > 0)
                                                {{ $j }}
                                                @elseif($j==0 && $i > 0)
                                                {{ $i }}
                                                @endif
                                            </td>
                                            @endfor
                                        </tr>
					@endfor
					</table>
				</div>
            </div>
            
        </div>
    </body>
</html>
