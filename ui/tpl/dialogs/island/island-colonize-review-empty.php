<?php
/**
 * Template:Dialog:Colonize
 * 
 * @title      Colonize review fragment
 * @desc       Template for when the user has no colonizers available
 * @copyright  (c) 2021, Stephino
 * @author     Mark Jivko <stephino.team@gmail.com>
 * @package    stephino-rpg
 * @license    GPL v3+, gnu.org/licenses/gpl-3.0.txt
 */
!defined('STEPHINO_RPG_ROOT') && exit();

/* @var $entityConfig Stephino_Rpg_Config_Unit|Stephino_Rpg_Config_Ship */
$entityConfigs = Stephino_Rpg_Renderer_Ajax_Action::getEntityConfigs(Stephino_Rpg_Db_Table_Convoys::CONVOY_TYPE_COLONIZER);
?>
<div class="col-12 p-2 text-center">
    <?php if (count($entityConfigs)):?>
        <?php if (1 == count($entityConfigs)):?>
            <?php echo esc_html__('Expand your empire with:', 'stephino-rpg');?>
        <?php else:?>
            <?php echo esc_html__('Expand your empire with one of the following:', 'stephino-rpg');?>
        <?php endif;?>
        <?php if (count($entityConfigs) > 1):?><ul><?php endif;?>
            <?php 
                foreach ($entityConfigs as $entityConfig):
                    $entityKey = $entityConfig instanceof Stephino_Rpg_Config_Unit
                        ? Stephino_Rpg_Config_Units::KEY
                        : Stephino_Rpg_Config_Ships::KEY;
            ?>
                <?php if (count($entityConfigs) > 1):?><li><?php endif;?>
                    <span 
                        data-effect="help"
                        data-effect-args="<?php echo $entityKey;?>,<?php echo $entityConfig->getId();?>">
                        <?php echo $entityConfig->getName(true);?>
                    </span>
                <?php if (count($entityConfigs) > 1):?></li><?php endif;?>
            <?php endforeach;?>
        <?php if (count($entityConfigs) > 1):?></ul><?php endif;?>
    <?php else: ?>
       <?php echo esc_html__('This game does not allow colonizers', 'stephino-rpg');?>
    <?php endif;?>
</div>