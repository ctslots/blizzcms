<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_general extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->load->database('auth', TRUE);
    }

    public function getUserInfoGeneral($id)
    {
        return $this->db->select('*')
                ->where('id', $id)
                ->get('fx_users');
    }

    public function getShopID($id)
    {
        return $this->db->select('*')
                ->where('id', $id)
                ->get('fx_shop');
    }

    public function getXML($url)
    {
        return simplexml_load_file($url);
    }

    public function getCharDPTotal($id)
    {
        $qq = $this->db->select('dp')
                ->where('accountid', $id)
                ->get('fx_credits');

        if ($qq->num_rows())
            return $qq->row('dp');
        else
            return '0';
    }

    public function getCharVPTotal($id)
    {
        $qq = $this->db->select('vp')
                ->where('accountid', $id)
                ->get('fx_credits');

        if ($qq->num_rows())
            return $qq->row('vp');
        else
            return '0';
    }

    public function getRealmName($id)
    {
        return $this->auth->select('name')
                ->where('id', $id)
                ->get('realmlist')
                ->row_array()['name'];
    }

    public function getMonth($id)
    {
        switch ($id)
        {
            case 1:
                return $this->lang->line('month_January');
                break;
            case 2:
                return $this->lang->line('month_February');
                break;
            case 3:
                return $this->lang->line('month_March');
                break;
            case 4:
                return $this->lang->line('month_April');
                break;
            case 5:
                return $this->lang->line('month_May');
                break;
            case 6:
                return $this->lang->line('month_June');
                break;
            case 7:
                return $this->lang->line('month_July');
                break;
            case 8:
                return $this->lang->line('month_August');
                break;
            case 9:
                return $this->lang->line('month_September');
                break;
            case 10:
                return $this->lang->line('month_October');
                break;
            case 11:
                return $this->lang->line('month_November');
                break;
            case 12:
                return $this->lang->line('month_December');
                break;
        }
    }

    public function getExpansionAction()
    {
        $expansion = $this->config->item('expansion_id');
        switch ($expansion)
        {
            case 1:
                return "1";
                break;
            case 2:
                return "1";
                break;
            case 3:
                return "1";
                break;
            case 4:
                return "1";
                break;
            case 5:
                return "1";
                break;
            case 6:
                return "2";
                break;
            case 7:
                return "2";
                break;
            case 8:
                return "2";
                break;
        }
    }

    public function getExpansionName()
    {
        $expansion = $this->config->item('expansion_id');
        switch ($expansion)
        {
            case 1:
                return "Vanilla";
                break;
            case 2:
                return "The Burning Crusade";
                break;
            case 3:
                return "Wrath of the Lich King";
                break;
            case 4:
                return "Cataclysm";
                break;
            case 5:
                return "Mist of Pandaria";
                break;
            case 6:
                return "Warlords of Draenor";
                break;
            case 7:
                return "Legion";
                break;
            case 8:
                return "Battle of Azeroth";
                break;
        }
    }

    public function getMaxLevel()
    {
        $expansion = $this->config->item('expansion_id');
        switch ($expansion)
        {
            case 1:
                return "60";
                break;
            case 2:
                return "70";
                break;
            case 3:
                return "80";
                break;
            case 4:
                return "85";
                break;
            case 5:
                return "90";
                break;
            case 6:
                return "100";
                break;
            case 7:
                return "110";
                break;
            case 8:
                return "120";
                break;
        }
    }

    public function getRealExpansionDB()
    {
        $expansion = $this->config->item('expansion_id');
        switch ($expansion)
        {
            case 1:
                return "0";
                break;
            case 2:
                return "1";
                break;
            case 3:
                return "2";
                break;
            case 4:
                return "3";
                break;
            case 5:
                return "4";
                break;
            case 6:
                return "5";
                break;
            case 7:
                return "6";
                break;
            case 8:
                return "7";
                break;
        }
    }

    public function getRaceName($race)
    {
        switch ($race)
        {
            case 1:
                return $this->lang->line('race_human');
                break;
            case 2:
                return $this->lang->line('race_orc');
                break;
            case 3:
                return $this->lang->line('race_dwarf');
                break;
            case 4:
                return $this->lang->line('race_night_elf');
                break;
            case 5:
                return $this->lang->line('race_undead');
                break;
            case 6:
                return $this->lang->line('race_tauren');
                break;
            case 7:
                return $this->lang->line('race_gnome');
                break;
            case 8:
                return $this->lang->line('race_troll');
                break;
            case 9:
                return $this->lang->line('race_goblin');
                break;
            case 10:
                return $this->lang->line('race_blood_elf');
                break;
            case 11:
                return $this->lang->line('race_draenei');
                break;
            case 22:
                return $this->lang->line('race_worgen');
                break;
            case 24:
                return $this->lang->line('race_panda_neutral');
                break;
            case 25:
                return $this->lang->line('race_panda_alli');
                break;
            case 26:
                return $this->lang->line('race_panda_horde');
                break;
            case 27:
                return $this->lang->line('race_nightborne');
                break;
            case 28:
                return $this->lang->line('race_highmountain_tauren');
                break;
            case 29:
                return $this->lang->line('race_void_elf');
                break;
            case 30:
                return $this->lang->line('race_lightforged_draenei');
                break;
            case 34:
                return $this->lang->line('race_dark_iron_dwarf');
                break;
            case 36:
                return $this->lang->line('race_maghar_orc');
                break;
        }
    }

    public function getRaceIcon($race)
    {
        switch ($race)
        {
            case 1:
                return 'human.jpg';
                break;
            case 2:
                return 'orc.jpg';
                break;
            case 3:
                return 'dwarf.jpg';
                break;
            case 4:
                return 'night_elf.jpg';
                break;
            case 5:
                return 'undead.jpg';
                break;
            case 6:
                return 'tauren.jpg';
                break;
            case 7:
                return 'gnome.jpg';
                break;
            case 8:
                return 'troll.jpg';
                break;
            case 9:
                return 'goblin.jpg';
                break;
            case 10:
                return 'blood_elf.jpg';
                break;
            case 11:
                return 'draenei.jpg';
                break;
            case 22:
                return 'worgen.jpg';
                break;
            case 25:
                return 'pandaren_male.jpg';
                break;
            case 26:
                return 'pandaren_female.jpg';
                break;
            // Legion Support Race Allied (BFA)
            case 27:
                return 'nightborne.png';
                break;
            case 28:
                return 'highmountain.png';
                break;
            case 29:
                return 'voidelf.png';
                break;
            case 30:
                return 'lightforged.png';
                break;
            case 34:
                return 'irondwarf.png';
                break;
            case 36:
                return 'magharorc.png';
                break;
        }
    }

    public function getClassIcon($race)
    {
        switch ($race)
        {
            case 1:
                return 'warrior.png';
                break;
            case 2:
                return 'paladin.png';
                break;
            case 3:
                return 'hunter.png';
                break;
            case 4:
                return 'rogue.png';
                break;
            case 5:
                return 'priest.png';
                break;
            case 6:
                return 'dk.png';
                break;
            case 7:
                return 'shaman.png';
                break;
            case 8:
                return 'mage.png';
                break;
            case 9:
                return 'warlock.png';
                break;
            case 10:
                return 'monk.png';
                break;
            case 11:
                return 'druid.png';
                break;
            case 12:
                return 'demonhunter.png';
                break;
        }
    }

    public function getFaction($race)
    {
        switch ($race)
        {
            case '1':
                return 'Alliance';
                break;
            case '3':
                return 'Alliance';
                break;
            case '4':
                return 'Alliance';
                break;
            case '7':
                return 'Alliance';
                break;
            case '11':
                return 'Alliance';
                break;
            case '22':
                return 'Alliance';
                break;
            case '25':
                return 'Alliance';
                break;
            case '29':
                return 'Alliance';
                break;
            case '30':
                return 'Alliance';
                break;
            case '34':
                return 'Alliance';
                break;
            case '2':
                return 'Horde';
                break;
            case '5':
                return 'Horde';
                break;
            case '6':
                return 'Horde';
                break;
            case '8':
                return 'Horde';
                break;
            case '10':
                return 'Horde';
                break;
            case '9':
                return 'Horde';
                break;
            case '26':
                return 'Horde';
                break;
            case '27':
                return 'Horde';
                break;
            case '28':
                return 'Horde';
                break;
            case '36':
                return 'Horde';
                break;
        }
    }

    public function getNameClass($class)
    {
        switch ($class)
        {
            case 1:
                return $this->lang->line('class_warrior');
                break;
            case 2:
                return $this->lang->line('class_paladin');
                break;
            case 3:
                return $this->lang->line('class_hunter');
                break;
            case 4:
                return $this->lang->line('class_rogue');
                break;
            case 5:
                return $this->lang->line('class_priest');
                break;
            case 6:
                return $this->lang->line('class_dk');
                break;
            case 7:
                return $this->lang->line('class_shamman');
                break;
            case 8:
                return $this->lang->line('class_mage');
                break;
            case 9:
                return $this->lang->line('class_warlock');
                break;
            case 10:
                return $this->lang->line('class_monk');
                break;
            case 11:
                return $this->lang->line('class_druid');
                break;
            case 12:
                return $this->lang->line('class_demonhunter');
                break;
        }
    }

    public function getGender($gender)
    {
        switch ($gender)
        {
            case 0:
                return $this->lang->line('gender_male');
                break;
            case 1:
                return $this->lang->line('gender_female');
                break;
        }
    }

    public function tinyEditor($plugin, $tool)
    {
        return "<script src=".base_url('core/tinymce/tinymce.min.js')."></script>
                <script>tinymce.init({
                    selector: '.tinyeditor',
                    language: '".$this->config->item('tinymce_language')."',
                    menubar: false,
                    plugins: ['".$this->tinyEditorTools($plugin)."'],
                    toolbar: '".$this->tinyEditorTools($tool)."'});
                </script>";
    }

    public function tinyEditorTools($tool)
    {
        switch ($tool) {
            case 'pluginsADM': return 'advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'; break;
            case 'pluginsUser': return 'advlist autolink autosave link lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'; break;

            case 'toolbarADM': return 'insert unlink emoticons | undo redo | formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | removeformat'; break;
            case 'toolbarUser': return 'emoticons | undo redo | fontselect fontsizeselect | bold italic | forecolor | bullist numlist outdent indent | link unlink | removeformat'; break;
        }
    }

    public function realmGetHostname($id)
    {
        return $this->auth->select('address')
                ->where('id', $id)
                ->get('realmlist')
                ->row_array()['address'];
    }

    public function getMenu()
    {
        return $this->db->select('*')
                ->get('fx_menu');
    }

    public function getMenuSon($id)
    {
        return $this->db->select('*')
                ->where('son', $id)
                ->get('fx_menu');
    }
}
