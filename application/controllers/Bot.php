<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Bot
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Bot extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Monitoring_model', 'monitoring');
		$this->load->model('Lokasi_tanaman_model', 'tanaman');
	}

	public function index()
	{

        $sensor = $this->monitoring->latestRecord();
        $lokasi = $this->tanaman->latestRecord();

		$messageSensor = 	"kelembaban udara : $sensor[humidity], ";
		$messageSensor .= 	"suhu : $sensor[temperature], ";
		$messageSensor .= 	"ph : $sensor[ph], ";
		$messageSensor .= 	"lux : $sensor[lux], ";
		$messageSensor .= 	"Kelembaban tanah : $sensor[moisture]";
		$messageLokasi = "Link : http://maps.google.com/maps?q=$lokasi[latitude],$lokasi[longitude]";
		$TOKEN = "1721286732:AAEHUeNX8Y1ba1hExDWy59UfbxclkEpaJ-E";
		$apiURL = "https://api.telegram.org/bot$TOKEN";
		$update = json_decode(file_get_contents("php://input"), TRUE);
		$chatID = $update["message"]["chat"]["id"];
		$message = $update["message"]["text"];

		if (strpos($message, "/getNilaiSensor") === 0) {

			file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$messageSensor&parse_mode=HTML");
		}
		
		if (strpos($message, "/getLokasiTanaman") === 0) {

			file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=$messageLokasi&parse_mode=HTML");
		}
	}
}


/* End of file Bot.php */
/* Location: ./application/controllers/Bot.php */
