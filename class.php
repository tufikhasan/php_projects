<?php
class ColorConvert {
    private $color, $red, $green, $blue;
    public function __construct( $colorCode = "" ) {
        $colorCode = ltrim( $colorCode, '#' );
        $this->color = substr( $colorCode, 0, 6 );
        $this->parseColor();
    }
    protected function parseColor() {
        if ( $this->color ) {
            list( $this->red, $this->green, $this->blue ) = sscanf( $this->color, "%02x%02x%02x" );
        } elseif ( strlen( $this->color ) >= 6 ) {
            list( $this->red, $this->green, $this->blue ) = [0, 0, 0];
        } else {
            list( $this->red, $this->green, $this->blue ) = [0, 0, 0];
        }

    }
    public function rgb() {
        return "rgb({$this->red}, {$this->green},{$this->blue})";
    }
    public function rgba() {
        return "rgba({$this->red}, {$this->green},{$this->blue}, 1)";
    }
}
if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $colorCode = $_POST['colorCode'];
    $color = new ColorConvert( $colorCode );
    $rgb = $color->rgb();
    $rgba = $color->rgba();
} else {
    $rgb = "rgb(0,0,0)";
    $rgba = "rgb(0,0,0,1)";
}
