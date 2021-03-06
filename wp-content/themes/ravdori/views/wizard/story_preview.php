<?php
/**
 *
 *
 * @author     Htmline (Roy Hizkya)
 * @copyright  Copyright (c) 2015 Beit Hatfutsot Israel. (http://www.bh.org.il)
 * @version    1.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<?php
global $wizardSessionManager;
$step4Data = $wizardSessionManager->getStepData( IWizardStep4Fields::ID );
$post_id = $step4Data[ IWizardStep4Fields::POST_ID ];
?>

<script>

    var $ = jQuery;

    /* Fields validation */
    $().ready(function () {

        $('#story-post').load('<?php echo  get_permalink($post_id) ; ?> .page-content' , function() {
            $.getScript(" <?php echo get_bloginfo('stylesheet_directory') . '/js/imageFitter.js'?>");

            <?php
                    global $wizardSessionManager;
                    $step4Data = $wizardSessionManager->getStepData( IWizardStep4Fields::ID );
            ?>

            <?php if ( !empty( $step4Data[ IWizardStep4Fields::RAVDORI_FEEDBACK ] ) ): ?>

            <?php $feedback =  json_encode( $step4Data[ IWizardStep4Fields::RAVDORI_FEEDBACK ] , JSON_UNESCAPED_UNICODE );?>
            var feedbackText;

            <?php if ($feedback): ?>

            feedbackText = '<p><h3 class="story-personal-view">';
            feedbackText += 'הזוית האישית';
            feedbackText += '</h3></p>';
            feedbackText += '<p>';
            feedbackText += <?php echo  $feedback;?>.replace( /\n/g, "<br />" );
            feedbackText += '</p>';

            $('.single-story .entry').append( feedbackText );


            <?php endif;?>
            <?php endif;?>

        });


    }); // Ready




     jQuery(document).ajaxStart(function () {});



    jQuery(document).ajaxComplete(function () {


        var caption2 = '<?php echo $step4Data[ IWizardStep4Fields::IMAGE_ADULT_DESC ]; ?>';
        var caption1 = '<?php echo $step4Data[ IWizardStep4Fields::IMAGE_ADULT_STUDENT_DESC ]; ?>';

        var $wrapper = $('.portrait-wrapper');
        // set the image sizes on load
        fitImages($wrapper.children().get(0), $wrapper.children().get(1), 20 , caption1 , caption2);


    });







</script>




<style>
    .fb-share-button,
    .printfriendly,
    .printfriendly-text2 { display: none !important; }
</style>

    <section class="page-content">

        <div class="container">

            <div class="row">

                <?Php include(WIZARD_VIEWS . '/components/progressbar.php'); //Show the progress bar ?>
                <div class="col-sm-12">

                <form id="wizard-form-step4" class="wizard-form" method="post">
                    <div class="title">
                        <h2><?php echo '5 - ' . $wizard_steps_captions[IWizardStep5Fields::ID - 1]; ?></h2>
                    </div>

                    <div class="submit" style="width: 100%;">
                        <div class="publish-story-caption">
                            <input type="submit" style="float: left;margin-left: 23px;" value="סיום ושליחת סיפור &#9664;"/>
                        </div>
                    </div>


                    <div id="story-post" style="margin-right: -16px;"></div>


                    <div class="submit">
                        <div class="publish-story-caption">
                            <input type="submit" style="float: left;margin-left: 23px;" value="סיום ושליחת סיפור &#9664;"/>
                        </div>
                    </div>

                    <input type="hidden" name="step" value="<?php echo IWizardStep5Fields::ID; ?>"/>
                    <?php wp_nonce_field( 'nonce_author_details_form_action' , 'nonce_author_details' ); ?>

                </form>

                <form name="step3"  class="wizard-form" method="post">
                    <input name="progstep" value="4" type="hidden">

                    <div class="submit">
                            <input type="submit" value="&#9654; הקודם"/>
                    </div>

                </form>
              </div>
            </div>
        </div>

    </section>
<?php  get_footer(); ?>
<?php



?>