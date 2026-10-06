<?php
/* * CSD : built to own, not rent. The comparison is a real table — three
   columns of like-for-like values is exactly what a table is for, and it gives
   a screen reader the row and column headers the visual version implies.
   The first row of own_compare is the header row. */
$csdRows  = $csd['own_compare'];
$csdHead  = array_shift($csdRows);
?>
<section class="csd-section csd-dark csd-own">
    <div class="csd-wrap csd-own-grid">
        <div class="csd-own-copy">
            <span class="csd-eyebrow"><?= $e($csd['own_eyebrow']) ?></span>
            <h2><?= $e($csd['own_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['own_lead']) ?></p>
            <ul class="csd-ticks csd-ticks-own">
                <?php foreach ($csd['own_points'] as $csdPoint): ?>
                <li><?= $e($csdPoint) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <table class="csd-compare">
            <caption class="csd-sr-only">Custom software compared with off-the-shelf software</caption>
            <thead>
                <tr>
                    <th scope="col"><?= $e($csdHead[0]) ?></th>
                    <th scope="col"><?= $e($csdHead[1]) ?></th>
                    <th scope="col"><?= $e($csdHead[2]) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($csdRows as [$csdLabel, $csdYes, $csdNo]): ?>
                <tr>
                    <th scope="row"><?= $e($csdLabel) ?></th>
                    <td class="csd-yes"><?= $e($csdYes) ?></td>
                    <td class="csd-no"><?= $e($csdNo) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php unset($csdRows, $csdHead, $csdPoint, $csdLabel, $csdYes, $csdNo); ?>
