<?php
class Vehicle
{
    private $type;
    private $speed;
    private $destinationDistance = 350;

    public function __construct($type,$speed)
    {
        $this->type = $type;
        $this->speed = $speed;
    }

    public function calculateDuration() {
        $result = ( $this->destinationDistance / $this->speed);
        
        if($this->type == 'boat'){
            $result = $result + 0.25;
        }

        return $this->type .' : '  . $result;
    }
}

$vehiclesWithSpeed  = ['sport-car' => 150,'truck' => 60,'bike' => 100,'boat' => 50];

foreach($vehiclesWithSpeed as $type => $speed) {
    $result = (new Vehicle($type, $speed))->calculateDuration();

    print($result."<br/>");
}
