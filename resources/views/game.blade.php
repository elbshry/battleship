<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <title>Battle Ship</title>
        <style type="text/css">
            .hit {
                background-color: darkred!important;
            }
            .miss {
                background-color: whitesmoke!important;
            }
            .out {
                background-color: lightgray!important;
                cursor: pointer;
            }
            .frame {
                background-color: gray!important;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
				<h1>Battle Ship</h1>
				
                                    @include('_board', ['player' => 1])
                                    @include('_board', ['player' => 2])
            </div>
            <div class="row">
                <a href="/reset" class="btn btn-primary">Start a new game</a>
            </div>
        </div>
        <script type="text/javascript">
        $(function () {
            $('#{{$game->getNextPlayer()}}').show();
            $(document).on('click', '.out', function(event) {
                if(isWon()) {
                    alert('Game is already won, please start a new one!');
                    return;
                }
                
                let td = $(this);
                $.ajax({
                    url : "{{route('game.check_hit')}}",
                    type : 'POST',
                    data : {
                        'i' : td.data('i'),
                        'j' : td.data('j'),
                        'player' : td.parents('div').first().attr('id')
                    },
                    dataType:'json',
                    success : function(data) {  
                        td.removeClass('out').addClass(data.class);
                        if(data.won === true) {
                            setWon();
                            alert('Player ' + $('.' + data.currentPlayer).text() + ' won the game');
                            return;
                        }
                        $('#' + data.currentPlayer).hide();
                        $('#' + data.nextPlayer).show();
                        alert(data.message);
                    },
                    error : function(request,error)
                    {
                        alert("Request: "+JSON.stringify(request));
                    }
                });
            });
            
            let won = false;
            
            function setWon() {
                won = true;
            }


            function isWon() {
                return won;
            }
         });
        </script>
    </body>
</html>
