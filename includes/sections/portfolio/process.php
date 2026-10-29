<?php
/* * Portfolio — "How we work": four stages on a line that fills once the section scrolls into view */
$pfSteps = [
    ['Discover', 'Understand', 'We uncover audience needs, business goals, and the smartest path forward.'],
    ['Design',   'Shape',      'We turn strategy into a distinctive interface with purposeful interactions.'],
    ['Build',    'Create',     'We engineer a responsive, reliable product with clean, scalable code.'],
    ['Launch',   'Grow',       'We test, refine, launch, and support continuous improvement after release.'],
];
?>
<section class="pf-process" id="process" aria-labelledby="pf-process-title">
  <div class="container">
    <div class="pf-process-top pf-reveal">
        <div>
            <!-- <div class="pf-kicker">How we work</div>
            <h2 id="pf-process-title">From idea to impact.</h2> -->
            <div class="pf-kicker">How We Work</div>
            <h2 id="pf-process-title">From Idea to Impact.</h2>
        </div>
        <p>A focused, collaborative process that keeps the work clear, the pace strong, and every decision tied to a real goal.</p>
    </div>
    <div class="pf-timeline">
        <div class="pf-timeline-track" aria-hidden="true"><span class="pf-timeline-fill"></span></div>
        <ol class="pf-timeline-steps">
            <?php foreach ($pfSteps as $pfI => [$pfStage, $pfTitle, $pfText]): ?>
            <li class="pf-timeline-step" style="--stage-delay:<?= $pfI ?>s">
                <div class="pf-timeline-node" aria-hidden="true"><?= sprintf('%02d', $pfI + 1) ?></div>
                <div class="pf-timeline-copy">
                    <div class="pf-timeline-stage"><?= $e($pfStage) ?></div>
                    <h3><?= $e($pfTitle) ?></h3>
                    <p><?= $e($pfText) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
  </div>
</section>
<?php unset($pfSteps, $pfI, $pfStage, $pfTitle, $pfText); ?>
