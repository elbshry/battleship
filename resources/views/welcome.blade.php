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
            <h1>Battle Ship</h1>
            <form class="form-horizontal" method="post" action="/play"> 
                <div class="mb-3">
                    <label for="p1" class="col-sm-3 control-label">Play 1 name</label>
                    <div class="col-sm-5">
                    <input type="text" name="p1" id="p1" class="form-control" placeholder="Player 1">
                </div>
                </div>
                <div class="mb-3">
                    <label for="p2" class="col-sm-3 control-label">Play 2 name</label>
                    <div class="col-sm-5">
                    <input type="text" name="p2" id="p2" class="form-control" placeholder="Player 2">
                </div>
                </div>
                  <button type="submit" class="btn btn-primary">Start Playing</button>
            </form>
        </div>
    </body>
</html>
