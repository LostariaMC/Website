<?php

namespace controllers;

use controllers\base\Web;
use entities\GameStats;
use entities\LostariaPlayer;
use models\RedisModel;
use utils\MojangUtils;

class Main extends Web {

    protected $redisModel;

    public function __construct(){
        $this->redisModel = new RedisModel();
    }

    function home() {
        $staffMembers = array(
            ["95fe8a20-67e6-4a09-96c5-e01ce73870a0", ["Owner", "Développeur"], "À l'origine du projet, Worsewarn continue de développer Lostaria et de le maintenir depuis plus de 4 ans. Il est le créateur de la grande majorité des mini-jeux."], // Worsewarn
            ["b8220a38-99ce-4347-8af1-53cbf55667ff", ["Développeur", "Sys Admin"], "Erpriex développe des fonctionnalités internes au serveur et s'occupe également de l'infrastructure. Il est au même titre à l'origine du développement du site de statistiques."], // Erpriex
            ["b2410d25-93d3-4045-a807-cdf3ebb4a323", ["Constructeur"], "Le build est le passe-temps favoris de Lycheesis. Il a construit un bon nombre de maps pour Lostaria, notamment en Pitchout, en Runaway, et en Gravity !"], // Lycheesis
            ["e272b935-1500-40a8-b79d-6f5844f1bc9d", ["Constructeur"], "D'une passion incontestable pour les maths, XEL0 réunit théorèmes et manuels pour construire les maps de vos rêves ! Il est notamment à l'origine de la réalisation du hub."], // XEL0
            ["938e86bd-5d16-49d4-b26a-6775036d744e", ["Développeuse"], "Convaincue que le hub soit un véritable terrain de jeux, ElloWorld est à l'origine du développement de la discothèque, de la pêche, et du dé à coudre."], // ElloWorld
            ["beb88774-a96c-4553-8379-c42c75395af7", ["Développeur"], "lumin0u intervient sur le développement de Lostaria depuis 2 ans. Il a notamment développé quelques jeux, comme le Arrow et le PloufCraft !"], // lumin0u
        );

        $error = false;
        if(isset($_POST['error'])){
            $error = true;
        }

        $this->header();
        include("views/common/searchbar.php");
        include("views/global/home.php");
        $this->footer();
    }

    function player() {
        if(!isset($_GET['q']) || strip_tags($_GET['q']) == ""){
            $this->redirect("./");
            return;
        }

        $playerName = strip_tags($_GET['q']);
        $playerUuid = MojangUtils::getUuid($playerName);
        if($playerUuid == ""){
            $_POST['error'] = "Aucun compte Minecraft n'est associé à ce joueur";
            $this->home();
            return;
        }
        $playerUuid = MojangUtils::getDashesUuid($playerUuid);

        $registered = $this->redisModel->keyExist("redisplayer:". $playerUuid);
        if(!$registered){
            $_POST['error'] = "Ce joueur ne s'est jamais connecté sur Lostaria, tu devrais l'inviter 😉";
            $this->home();
            return;
        }

        $redisPlayer = $this->redisModel->getOne("redisplayer:". $playerUuid);
        $playerObj = json_decode($redisPlayer, true);
        $player = new LostariaPlayer($playerObj);
        $playerName = $player->getName();

        $sanction = "";
        if($this->redisModel->keyExist("sanctions.mute.". $playerUuid)){
            $sanction = "réduit au silence";
        }
        if($this->redisModel->keyExist("sanctions.ban.". $playerUuid)){
            $sanction = "banni";
        }

        $gameStats = new GameStats($playerUuid, $this->redisModel);

        $this->header("Profil de ". $playerName ." • Lostaria", $playerName);
        include("views/common/searchbar.php");
        include("views/global/player.php");
        $this->footer();
    }

    function legal(){
        $this->header();
        include("views/common/legal.php");
    }

    function survival(){
        $keys = $this->redisModel->getKeysWithPattern("EXPRESS_SURVIVAL*");
        $playersAchievements = array();
        foreach ($keys as $key){
            $keyWork = str_replace("EXPRESS_SURVIVAL/", "", $key);

            $uuid = substr($keyWork, 0, 36);
            $achievement = substr($keyWork, 46);

            if(array_key_exists($uuid, $playersAchievements)){
                $playersAchievements[$uuid][] = $achievement;
            }else{
                $playersAchievements[$uuid] = [$achievement];
            }
        }
        arsort($playersAchievements);

        $achievementsInfos = [];
        $achievementsInfos["adventure/avoid_vibration"] = ["Sans un bruit", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.avoid_vibration"];
        $achievementsInfos["adventure/craft_decorated_pot_using_only_sherds"] = ["Le passé recomposé", "#"];
        $achievementsInfos["adventure/fall_from_world_height"] = ["Tombé du ciel", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.fall_from_world_height"];
        $achievementsInfos["adventure/hero_of_the_village"] = ["Héros du village", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.hero_of_the_village"];
        $achievementsInfos["adventure/honey_block_slide"] = ["Atterissage en douceur", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.honey_block_slide"];
        $achievementsInfos["adventure/kill_a_mob"] = ["Chasseur de monstres", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.kill_a_mob"];
        $achievementsInfos["adventure/ol_betsy"] = ["La vieille Bertha", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.ol_betsy"];
        $achievementsInfos["adventure/read_power_of_chiseled_bookshelf"] = ["Le savoir, c'est le pouvoir", "#"];
        $achievementsInfos["adventure/salvage_sherd"] = ["Sa place est dans un musée", "#"];
        $achievementsInfos["adventure/shoot_arrow"] = ["Dans la ligne de mire", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.shoot_arrow"];
        $achievementsInfos["adventure/sleep_in_bed"] = ["Bonne nuit les petits", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.sleep_in_bed"];
        $achievementsInfos["adventure/spyglass_at_ghast"] = ["Est-ce une mongolfière ?", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.spyglass_at_ghast"];
        $achievementsInfos["adventure/spyglass_at_parrot"] = ["Est-ce un oiseau ?", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.spyglass_at_parrot"];
        $achievementsInfos["adventure/trade"] = ["Adjugé, vendu !", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.trade"];
        $achievementsInfos["adventure/trade_at_world_height"] = ["Un commerce à la hauteur", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.trade_at_world_height"];
        $achievementsInfos["adventure/voluntary_exile"] = ["Exil volontaire", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.voluntary_exile"];
        $achievementsInfos["adventure/walk_on_powder_snow_with_leather_boots"] = ["Léger comme un lapin", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.walk_on_powder_snow_with_leather_boots"];
        $achievementsInfos["adventure/whos_the_pillager_now"] = ["C'est qui le pillard maintenant ?", "https://fr-minecraft.net/popup_advancement.php?advancement=adventure.whos_the_pillager_now"];
        $achievementsInfos["end/dragon_egg"] = ["La nouvelle génération", "https://fr-minecraft.net/popup_advancement.php?advancement=end.dragon_egg"];
        $achievementsInfos["end/elytra"] = ["Vers l'infini et au-delà", "https://fr-minecraft.net/popup_advancement.php?advancement=end.elytra"];
        $achievementsInfos["end/enter_end_gateway"] = ["Escapade à distance", "https://fr-minecraft.net/popup_advancement.php?advancement=end.enter_end_gateway"];
        $achievementsInfos["end/find_end_city"] = ["Les mystérieuses cités de l'End", "https://fr-minecraft.net/popup_advancement.php?advancement=end.find_end_city"];
        $achievementsInfos["end/kill_dragon"] = ["Libérez l'End !", "https://fr-minecraft.net/popup_advancement.php?advancement=end.kill_dragon"];
        $achievementsInfos["husbandry/axolotl_in_a_bucket"] = ["Le plus mignon des prédateurs", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.axolotl_in_a_bucket"];
        $achievementsInfos["husbandry/breed_an_animal"] = ["Il y a de l'amour dans l'air", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.breed_an_animal"];
        $achievementsInfos["husbandry/fishy_business"] = ["Merci pour le poisson", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.fishy_business"];
        $achievementsInfos["husbandry/make_a_sign_glow"] = ["Une idée brillante !", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.make_a_sign_glow"];
        $achievementsInfos["husbandry/obtain_sniffer_egg"] = ["Découverte olfactive", "#"];
        $achievementsInfos["husbandry/plant_seed"] = ["Prends-en de la graine !", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.plant_seed"];
        $achievementsInfos["husbandry/ride_a_boat_with_a_goat"] = ["Flottage de chèvre", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.ride_a_boat_with_a_goat"];
        $achievementsInfos["husbandry/safely_harvest_honey"] = ["J'irai butiner chez vous", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.safely_harvest_honey"];
        $achievementsInfos["husbandry/silk_touch_nest"] = ["Dé-miel-nagement", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.silk_touch_nest"];
        $achievementsInfos["husbandry/tactical_fishing"] = ["Pêche tactique", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.tactical_fishing"];
        $achievementsInfos["husbandry/tame_an_animal"] = ["Meilleurs amis pour la vie", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.tame_an_animal"];
        $achievementsInfos["husbandry/wax_off"] = ["Frotter", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.wax_off"];
        $achievementsInfos["husbandry/wax_on"] = ["Lustrer", "https://fr-minecraft.net/popup_advancement.php?advancement=husbandry.wax_on"];
        $achievementsInfos["nether/brew_potion"] = ["Apprenti chimiste", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.brew_potion"];
        $achievementsInfos["nether/charge_respawn_anchor"] = ["Pas tout à fait \"neuf\" vies", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.charge_respawn_anchor"];
        $achievementsInfos["nether/distract_piglin"] = ["Bling-bling", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.distract_piglin"];
        $achievementsInfos["nether/explore_nether"] = ["Voyage au bout de l'enfer", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.explore_nether"];
        $achievementsInfos["nether/fast_travel"] = ["Bulle du sous-espace", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.fast_travel"];
        $achievementsInfos["nether/find_bastion"] = ["Le bon vieux temps", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.find_bastion"];
        $achievementsInfos["nether/find_fortress"] = ["Une terrible forteresse", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.find_fortress"];
        $achievementsInfos["nether/loot_bastion"] = ["De vraies têtes de cochon", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.loot_bastion"];
        $achievementsInfos["nether/get_wither_skull"] = ["Qu'on lui coupe la tête !", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.get_wither_skull"];
        $achievementsInfos["nether/obtain_ancient_debris"] = ["Caché dans les profondeurs", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.obtain_ancient_debris"];
        $achievementsInfos["nether/obtain_blaze_rod"] = ["Dans le feu de l'action", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.obtain_blaze_rod"];
        $achievementsInfos["nether/obtain_crying_obsidian"] = ["Qui a coupé un oignon ?", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.obtain_crying_obsidian"];
        $achievementsInfos["nether/return_to_sender"] = ["Retour à l'envoyeur", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.return_to_sender"];
        $achievementsInfos["nether/ride_strider"] = ["Bateau sur pattes", "https://fr-minecraft.net/popup_advancement.php?advancement=nether.ride_strider"];
        $achievementsInfos["story/cure_zombie_villager"] = ["Zombiologue", "https://fr-minecraft.net/popup_advancement.php?advancement=story.cure_zombie_villager"];
        $achievementsInfos["story/deflect_arrow"] = ["Pas aujourd'hui, merci", "https://fr-minecraft.net/popup_advancement.php?advancement=story.deflect_arrow"];
        $achievementsInfos["story/enchant_item"] = ["Enchanté !", "https://fr-minecraft.net/popup_advancement.php?advancement=story.enchant_item"];
        $achievementsInfos["story/enter_the_end"] = ["Fin ?", "https://fr-minecraft.net/popup_advancement.php?advancement=story.enter_the_end"];
        $achievementsInfos["story/enter_the_nether"] = ["Aller au fond des choses", "https://fr-minecraft.net/popup_advancement.php?advancement=story.enter_the_nether"];
        $achievementsInfos["story/follow_ender_eye"] = ["À suivre…", "https://fr-minecraft.net/popup_advancement.php?advancement=story.follow_ender_eye"];
        $achievementsInfos["story/form_obsidian"] = ["Ice Bucket Challenge", "https://fr-minecraft.net/popup_advancement.php?advancement=story.form_obsidian"];
        $achievementsInfos["story/iron_tools"] = ["Bonne pioche !", "https://fr-minecraft.net/popup_advancement.php?advancement=story.iron_tools"];
        $achievementsInfos["story/lava_bucket"] = ["Chaud devant !", "https://fr-minecraft.net/popup_advancement.php?advancement=story.lava_bucket"];
        $achievementsInfos["story/mine_diamond"] = ["Des diamants !", "https://fr-minecraft.net/popup_advancement.php?advancement=story.mine_diamond"];
        $achievementsInfos["story/mine_stone"] = ["L'âge de pierre", "https://fr-minecraft.net/popup_advancement.php?advancement=story.mine_stone"];
        $achievementsInfos["story/obtain_armor"] = ["Un corps d'acier", "https://fr-minecraft.net/popup_advancement.php?advancement=story.obtain_armor"];
        $achievementsInfos["story/shiny_gear"] = ["Couvrez-moi de diamants", "https://fr-minecraft.net/popup_advancement.php?advancement=story.shiny_gear"];
        $achievementsInfos["story/smelt_iron"] = ["L'âge du fer", "https://fr-minecraft.net/popup_advancement.php?advancement=story.smelt_iron"];
        $achievementsInfos["story/upgrade_tools"] = ["Qualité supérieure", "https://fr-minecraft.net/popup_advancement.php?advancement=story.upgrade_tools"];

        $this->header();
        include("views/common/survival.php");
        $this->footer();
    }
}