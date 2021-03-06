<?php

namespace Database;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Veilinghuis\Aanbieder;
use Veilinghuis\Bieder;
use Veilinghuis\Bod;
use Veilinghuis\Goed;
use Veilinghuis\Kavel;
use Veilinghuis\Kavellijst;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntityManager
 *
 * @author Walter
 */
class EntityManager {
    //put your code here
    
    private $connection;
    
    function __construct(){
        
        include('/../config/config_db_local.php');
        $this->connection = DriverManager::getConnection($connectionParams, new Configuration());
    }
    
    function vindBiederMetBiederID($biederID){
        $bieder = null;
        $sql = "SELECT * 
                FROM bieder
                WHERE bieder_id = :biederID"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('biederID', $biederID);
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $bieder = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['bieder_id']);
        }

        return $bieder;
    }
    
    function vindAlleBieders(){
        $bieders = null;
        $sql = "SELECT * 
                FROM bieder"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $bieders[] = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['bieder_id']);
        }

        return $bieders;
    }
    
    function vindAanbiederMetAanbiederID($aanbiederID){
        $aanbieder = null;
        $sql = "SELECT * 
                FROM aanbieder
                WHERE aanbieder_id = :aanbiederID"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('aanbiederID', $aanbiederID);
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $aanbieder = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['aanbieder_id']);
        }

        return $aanbieder;
    }
    
    function vindNieuwsteBiederID(){
        $id = null;
        $sql = "SELECT max(bieder_id) FROM bieder";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $id = $row['bieder_id'];
        }
        
        return $id;
    }
    
    function vindNieuwsteAanbiederID(){
        $id = null;
        $sql = "SELECT max(aanbieder_id) as aanbieder_id FROM aanbieder";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $id = $row['aanbieder_id'];
        }
        
        return $id;
    }
    
    function vindAlleAanbieders(){
        $aanbieders = null;
        $sql = "SELECT * 
                FROM aanbieder"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $aanbieders[] = new Aanbieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['aanbieder_id']);
        }

        return $aanbieders;
    }
    
    function nieuweBieder(Bieder $bieder){
        $biederVoornaam = $bieder->getNaam()->getVoornaam();
        $biederTussenvoegsel = $bieder->getNaam()->getTussenvoegsel();
        $biederAchternaam = $bieder->getNaam()->getAchternaam();
        
        $biederStraatnaam = $bieder->getAdres()->getStraat();
        $biederHuisnummer = $bieder->getAdres()->getHuisnummer();
        $biederHuisnummerToevoeging = $bieder->getAdres()->getToevoeging();
        $biederPostcode = $bieder->getAdres()->getPostcode();
        $biederWoonplaats = $bieder->getAdres()->getWoonplaats();
        
        $sql = "INSERT INTO bieder(voornaam, tussenvoegsel, achternaam, straat, huisnummer, toevoeging"
                . ", postcode, woonplaats) VALUES(:voornaam, :tussenvoegsel, :achternaam, "
                . ":straat, :huisnummer, :toevoeging, :postcode, :woonplaats)"; 
        
        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('voornaam', $biederVoornaam);
        $stmt->bindValue('tussenvoegsel', $biederTussenvoegsel);
        $stmt->bindValue('achternaam', $biederAchternaam);
        $stmt->bindValue('straat', $biederStraatnaam);
        $stmt->bindValue('huisnummer', $biederHuisnummer);
        $stmt->bindValue('toevoeging', $biederHuisnummerToevoeging);
        $stmt->bindValue('postcode', $biederPostcode);
        $stmt->bindValue('woonplaats', $biederWoonplaats);
        $stmt->execute();
    }
    
    function nieuweAanbieder(Aanbieder $aanbieder){
        $aanbiederVoornaam = $aanbieder->getNaam()->getVoornaam();
        $aanbiederTussenvoegsel = $aanbieder->getNaam()->getTussenvoegsel();
        $aanbiederAchternaam = $aanbieder->getNaam()->getAchternaam();
        
        $aanbiederStraatnaam = $aanbieder->getAdres()->getStraat();
        $aanbiederHuisnummer = $aanbieder->getAdres()->getHuisnummer();
        $aanbiederHuisnummerToevoeging = $aanbieder->getAdres()->getToevoeging();
        $aanbiederPostcode = $aanbieder->getAdres()->getPostcode();
        $aanbiederWoonplaats = $aanbieder->getAdres()->getWoonplaats();
        
        $sql = "INSERT INTO aanbieder(voornaam, tussenvoegsel, achternaam, straat, huisnummer, toevoeging"
                . ", postcode, woonplaats) VALUES(:voornaam, :tussenvoegsel, :achternaam, "
                . ":straat, :huisnummer, :toevoeging, :postcode, :woonplaats)"; 
        
        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('voornaam', $aanbiederVoornaam);
        $stmt->bindValue('tussenvoegsel', $aanbiederTussenvoegsel);
        $stmt->bindValue('achternaam', $aanbiederAchternaam);
        $stmt->bindValue('straat', $aanbiederStraatnaam);
        $stmt->bindValue('huisnummer', $aanbiederHuisnummer);
        $stmt->bindValue('toevoeging', $aanbiederHuisnummerToevoeging);
        $stmt->bindValue('postcode', $aanbiederPostcode);
        $stmt->bindValue('woonplaats', $aanbiederWoonplaats);
        $stmt->execute();
    }
    
    function nieuwGoed(Goed $goed){
        $goedNaam = $goed->getNaam();
        $goedAanbiederID = $goed->getAanbiederId();
        $goedOmschrijving = $goed->getOmschrijving();
        
        $sql = "INSERT INTO goed(goed_naam, omschrijving, aanbieder_id)"
                . "VALUES(:goed_naam, :omschrijving, :aanbieder_id)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('goed_naam', $goedNaam);
        $stmt->bindValue('omschrijving', $goedOmschrijving);
        $stmt->bindValue('aanbieder_id', $goedAanbiederID);
        $stmt->execute();
    }
    
    function vindOnverkaveldeGoederen(){
        $goederen = array();
        
        $sql = "SELECT * FROM goed WHERE kavel_id is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $goed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $goed ->setGoedNummer($row['goed_id']);
            $goederen[] = $goed;
        }
        
        return $goederen;
    }
    
    function vindGoedMetGoednummer($goednummer){
        $goed = null;
        $sql = "SELECT * FROM goed WHERE goed_id = :goedNummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('goedNummer', $goednummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $eenGoed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $eenGoed->setGoedNummer($row['goed_id']);
            $goed = $eenGoed;
        }
        
        return $goed;
    }
    
    function volgendKavelnummer(){
        $maxKavelNummer = 0;
        $sql = "SELECT max(kavel_id) as kavel_id FROM goed";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            if ($row['kavel_id'] != null) {
                $maxKavelNummer = $row['kavel_id'];
            }
        }
        
        return $maxKavelNummer + 1;
    }
    
    function maakNieuwKavel(Kavel $kavel){
        $sql = "INSERT INTO kavel(kavel_naam, omschrijving) VALUES(:naam, :omschrijving)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('naam', $kavel->getNaam());
        $stmt->bindValue('omschrijving', $kavel->getOmschrijving());
        $stmt->execute();
    }
    
    function verkavelGoed(Goed $goed, $kavelnummer){
        $sql = "UPDATE goed SET kavel_id = :kavelnummer WHERE goed_id = :goed_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelnummer', $kavelnummer);
        $stmt->bindValue('goed_id', $goed->getGoedNummer());
        $stmt->execute();
    }
    
    function vindKavelsZonderLijst(){
        $kavels = array();
        
        $sql = "SELECT * FROM kavel WHERE kavellijst_id is null ORDER BY plaats_op_kavellijst ASC";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel ->setKavelNummer($row['kavel_id']);
            $kavels[] = $kavel;
        }
        
        return $kavels;
    }
    
    function vindGoederenOpKavelnummer($kavelNummer){
        $goederen = array();
        
        $sql = "SELECT * FROM goed WHERE kavel_id = :kavelNummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelNummer', $kavelNummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $goed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $goed ->setGoedNummer($row['goed_id']);
            $goederen[] = $goed;
        }
        
        return $goederen;
    }
    
    function volgendKavellijstnummer(){
        $maxKavellijstNummer = 0;
        $sql = "SELECT max(kavellijst_id) as kavellijst_id FROM kavel ORDER BY plaats_op_kavellijst ASC";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            if ($row['kavellijst_id'] != null) {
                $maxKavellijstNummer = $row['kavellijst_id'];
            }
        }
        
        return $maxKavellijstNummer + 1;
    }
    
    function maakKavellijstAan(){
        $sql = "INSERT INTO kavellijst(kavellijst_id, veilingsdatum) VALUES( null, null)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
    
    function vindKavelMetKavelNummer($kavelNummer){
        $kavel = null;
        
        $sql = "SELECT * FROM kavel WHERE kavel_id = :kavelNummer ORDER BY plaats_op_kavellijst ASC";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelNummer', $kavelNummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel->setKavelNummer($row['kavel_id']);
        }
        
        return $kavel;
    }
    
    function voegToeAanKavellijst(Kavel $kavel, $kavellijstNummer, $plaatsOpLijst){
        $sql = "UPDATE kavel SET kavellijst_id = :kavellijstNummer, plaats_op_kavellijst = :plaats WHERE kavel_id = :kavelID";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstNummer', $kavellijstNummer);
        $stmt->bindValue('kavelID', $kavel->getKavelNummer());
        $stmt->bindValue('plaats', $plaatsOpLijst);
        $stmt->execute();
    }
    
    function registreerVoorbod(Bod $bod){
        $sql = "INSERT INTO voorbod(bieder_id, kavel_id, bedrag) VALUES(:bieder_id, :kavel_id, :bedrag)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('bieder_id', $bod->getBiederNummer());
        $stmt->bindValue('kavel_id', $bod->getKavelNummer());
        $stmt->bindValue('bedrag', $bod->getBedragGeboden());
        $stmt->execute();
    }
    
    function verwijderVoorbod(Bieder $bieder, Kavel $kavel){
        $sql = "DELETE FROM voorbod WHERE bieder_id = :bieder_id AND kavel_id = :kavel_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('bieder_id', $bieder->getBiederID());
        $stmt->bindValue('kavel_id', $kavel->getKavelNummer());
        $stmt->execute();
    }
    
    function vindKavelsMetKavellijstnummer($kavellijstnummer){
        $kavels = null;
        
        $sql = "SELECT * FROM kavel WHERE kavellijst_id = :kavellijstnummer ORDER BY plaats_op_kavellijst ASC";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstnummer', $kavellijstnummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel->setKavelNummer($row['kavel_id']);
            $kavels[] = $kavel;
        }
        
        return $kavels;
    }
    
    function vindKavellijstenZonderVeiling(){
        $kavellijsten = array();
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE veilingsdatum is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijsten[] = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijsten;
    }
    
    function vindKavellijstMetKavellijstNummer($kavellijstnummer){
        $kavellijst = array();
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE kavellijst_id = :kavellijstnummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstnummer', $kavellijstnummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijst = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijst;
    }
    
    function wijsKavellijstToeAanVeiling(Kavellijst $kavellijst, $datum){
        $sql = "UPDATE kavellijst SET veilingsdatum = :datum WHERE kavellijst_id = :kavellijstnummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('datum', $datum);
        $stmt->bindValue('kavellijstnummer', $kavellijst->getKavellijstId());
        $stmt->execute();
    }
    
    function vindKavellijstMetDatum($datum){
        $kavellijst = null;
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE veilingsdatum = :datum";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('datum', date_format($datum, "Y-m-d"));
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijst = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijst;
    }
    
    function ordenKavellijst($kavelNummersOpVolgorde){
        if(is_array($kavelNummersOpVolgorde)){
          for($i=0; $i < count($kavelNummersOpVolgorde); $i++){
                $rangOpLijst = $i+1;
                $sql = "UPDATE kavel SET plaats_op_kavellijst = :rang WHERE kavel_id = :kavelNummer";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('rang', $rangOpLijst);
                $stmt->bindValue('kavelNummer', $kavelNummersOpVolgorde[$i]);
                $stmt->execute();
          }  
        }
    }
    
    function verwijderLozeKavellijsten(){
        $sql = "DELETE FROM kavellijst WHERE kavellijst_id = :nummer";
        $nummer = $this->volgendKavellijstnummer();        
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('nummer', $nummer);
                $stmt->execute();
                $this->setAutoIncrementKavellijsten();
    }
    
    function setAutoIncrementKavellijsten(){
        $sql = "ALTER TABLE kavellijst AUTO_INCREMENT = ".$this->volgendKavellijstnummer()."";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
    }
    
    function vindVoorbodOpKavel(Kavel $kavel){
        $bod = null;
        $sql = "SELECT bieder_id, bedrag FROM voorbod WHERE kavel_id = :kavelNummer";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('kavelNummer', $kavel->getKavelNummer());
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $biederNummer = $row['bieder_id'];
                    $bedrag = $row['bedrag'];
                    $bod = new Bod($biederNummer, $kavel->getKavelNummer(), $bedrag);
                }
                    return $bod;
    }
    
   
    function genereerTokens($datum){
        $bieders = $this->vindAlleBieders();
        if(!is_array($bieders)){
            return null;
        }
        for($i=1; $i<501; $i++){
            $k = array_rand($bieders);
            if(!$k){
                break;
            }
            $huidigeBieder = $bieders[$k];
            unset($bieders[$k]);
            $sql = "INSERT INTO token(token_id, bieder_id, veilingsdatum) VALUES(:token, :bieder_id, :datum)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue('token', $i);
            $stmt->bindValue('bieder_id', $huidigeBieder->getBiederID());
            $stmt->bindValue('datum', $datum);
            $stmt->execute();
        }
    }
    
    function vindTokenMetBiederEnDatum(Bieder $bieder, $datum){
                $sql = "SELECT token_id FROM token WHERE bieder_id = :biederNummer AND veilingsdatum = :datum";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('biederNummer', $bieder->getBiederID());
                $stmt->bindValue('datum', date_format($datum, "Y-m-d"));
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    return $row['token_id'];
                }
                
                return null;
    }
    
    function vindBiederMetTokenEnDatum($tokennummer, $datum){
        $sql = "SELECT bieder_id FROM token WHERE token_id = :tokenNummer AND veilingsdatum = '".date_format($datum, "Y-m-d")."'";
        $bieder = null; 
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('tokenNummer', $tokennummer);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $bieder = $this->vindBiederMetBiederID($row['bieder_id']);
                }
                return $bieder;
    }
    
    function vindDatumMetKavelnummer($kavelnummer){
        $sql = "SELECT veilingsdatum FROM kavellijst, kavel "
                . "WHERE kavel.kavellijst_id = kavellijst.kavellijst_id "
                . "AND kavel.kavel_id = :kavelnummer";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('kavelnummer', $kavelnummer);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    return $row['veilingsdatum'];
                }
                
                return null;
    }
    
    function nieuweBieding(Bod $bieding){
        $sql = "INSERT INTO bieding(kavel_id, bieder_id, bedrag) VALUES(:kavel_id, :bieder_id, :bedrag)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue('kavel_id', $bieding->getKavelNummer());
            $stmt->bindValue('bieder_id', $bieding->getBiederNummer());
            $stmt->bindValue('bedrag', $bieding->getBedragGeboden());
            $stmt->execute();
    }
    
    function vindAlleOpenBodBetalingen(){
        $betalingen = array();
        $sql = "SELECT bi.voornaam, bi.tussenvoegsel, bi.achternaam, bo.kavel_id, (bo.bedrag * 1.25) as bedrag, kl.veilingsdatum "
                . "FROM bieder bi, bieding bo, kavel kv, kavellijst kl "
                . "WHERE bi.bieder_id = bo.bieder_id AND "
                . "bo.kavel_id = kv.kavel_id AND "
                . "kv.kavellijst_id = kl.kavellijst_id AND "
                . "bo.betaald = false";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $betalingen[] = array('naam' => $row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam'],
                        'kavel' => $row['kavel_id'], 'bedrag' => number_format($row['bedrag'], 2, ",", "."), 'datum' => $row['veilingsdatum'], 'bodkavel' => "Bod op kavel: ");
                }
                
                return $betalingen;
    }
    
    function vindAlleOpenKavelBetalingen(){
        $betalingen = array();
        $sql = "SELECT ab.voornaam, ab.tussenvoegsel, ab.achternaam, bo.kavel_id, kl.veilingsdatum, (bo.bedrag * -0.75) as bedrag 
                FROM aanbieder ab, bieding bo, kavellijst kl, kavel ka, goed go  
                WHERE bo.kavel_id = ka.kavel_id AND 
                ka.kavel_id = kl.kavellijst_id AND 
                ka.kavel_id = go.kavel_id AND 
                go.aanbieder_id = ab.aanbieder_id AND 
                bo.betaald = false
                GROUP BY bo.kavel_id";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $betalingen[] = array('naam' => $row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam'],
                        'kavel' => $row['kavel_id'], 'bedrag' => number_format($row['bedrag'], 2, ",", "."), 'datum' => $row['veilingsdatum'], 'bodkavel' => "Kavel: ");
                }
                
                return $betalingen;
    }
    
    function vindAlleGeslotenBodBetalingen(){
        $betalingen = array();
        $sql = "SELECT bi.voornaam, bi.tussenvoegsel, bi.achternaam, bo.kavel_id, (bo.bedrag * 0.25) as bedrag, kl.veilingsdatum "
                . "FROM bieder bi, bieding bo, kavel kv, kavellijst kl "
                . "WHERE bi.bieder_id = bo.bieder_id AND "
                . "bo.kavel_id = kv.kavel_id AND "
                . "kv.kavellijst_id = kl.kavellijst_id AND "
                . "bo.betaald = true";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $betalingen[] = array('naam' => $row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam'],
                        'kavel' => $row['kavel_id'], 'bedrag' => number_format($row['bedrag'], 2, ",", "."), 'datum' => $row['veilingsdatum'], 'bodkavel' => "Bod op kavel: ");
                }
                
                return $betalingen;
    }
    
    function vindAlleGeslotenKavelBetalingen(){
        $betalingen = array();
        $sql = "SELECT ab.voornaam, ab.tussenvoegsel, ab.achternaam, bo.kavel_id, kl.veilingsdatum, (bo.bedrag * 0.25) as bedrag 
                FROM aanbieder ab, bieding bo, kavellijst kl, kavel ka, goed go  
                WHERE bo.kavel_id = ka.kavel_id AND 
                ka.kavel_id = kl.kavellijst_id AND 
                ka.kavel_id = go.kavel_id AND 
                go.aanbieder_id = ab.aanbieder_id AND 
                bo.betaald = true
                GROUP BY bo.kavel_id";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                
                while($row = $stmt->fetch()){
                    $betalingen[] = array('naam' => $row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam'],
                        'kavel' => $row['kavel_id'], 'bedrag' => number_format($row['bedrag'], 2, ",", "."), 'datum' => $row['veilingsdatum'], 'bodkavel' => "Kavel: ");
                }
                
                return $betalingen;
    }
    
    function sluitBetalingenOpKavel(Kavel $kavel){
        $sql = "UPDATE bieding SET betaald = true WHERE kavel_id = :kavelnummer";
        
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue('kavelnummer', $kavel->getKavelNummer());
                $stmt->execute();
    }
}
