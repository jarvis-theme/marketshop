<!DOCTYPE html>
<html>
    <head>
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }} 
        {{ Theme::asset()->styles() }}
    </head>
    <body>
        <div class="wrapper-wide">
        {{ Theme::partial('header') }} 
        {{ Theme::place('content') }} 
        {{ Theme::partial('footer') }} 
        {{ Theme::partial('defaultjs') }} 
        {{ Theme::asset()->scripts() }}
        {{ Theme::partial('analytic') }} 
        </div>
    </body>
</html>