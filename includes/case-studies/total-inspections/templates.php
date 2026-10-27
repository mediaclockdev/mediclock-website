<?php
/* * Total Inspection — admin portal template management screen, drawn in HTML so it stays sharp
   at any size (styled by .cs-mock in case-study.css; the numbers and lists
   tick over in assets/js/case-studies/total-inspections.js) */
include_once __DIR__ . '/icons.php';
?>
<div class="cs-mock" style="--vw:140">
<div class="as"><b class="lo">TOTAL<br>INSPECTIONS</b><span class="ap">ADMIN PORTAL</span><span class="ts">Total Inspection</span>
<ul><li><?= cs_ti_icon('dash') ?>DASHBOARD</li><li class="on"><?= cs_ti_icon('tree') ?>TEMPLATES</li><li><?= cs_ti_icon('pal') ?>BRANDING</li><li><?= cs_ti_icon('doc') ?>REPORTS</li>
</ul><div class="nw tp"><?= cs_ti_icon('plus') ?>New Template</div><div class="ft"><span><?= cs_ti_icon('gear') ?>Settings</span><span><?= cs_ti_icon('help') ?>Support</span></div>
</div>
<div class="mn">
<div class="tb"><span class="sr"><?= cs_ti_icon('search') ?>Search templates...</span><span class="bl"><?= cs_ti_icon('bell') ?><u></u></span><span class="us"><span>Alex Stratton<small>SYSTEM ADMIN</small></span><span class="avt pho"></span></span></div>
<div class="pd"><div class="bc">Dashboard &nbsp;›&nbsp; <b>Template Management</b></div>
<div class="tr"><div><div class="t4">Template Management<span class="lv"><u></u>LIVE</span></div><div class="sub" style="max-width:56em">Configure and standardize your inspection frameworks. Ensure compliance and consistency across all field reports.</div></div><div class="bt"><i class="gy"><?= cs_ti_icon('filter') ?>Filter</i><i class="bp"><?= cs_ti_icon('plus') ?>Create Template</i></div></div>
<div class="tg3"><div class="tc k1"><div class="th"><span class="it"><?= cs_ti_icon('home') ?></span><span class="pl">RESIDENTIAL</span></div><div class="t5">Pre-Purchase Structural</div><p>Comprehensive structural assessment for domestic…</p><div class="tf"><span><b data-k="s1">12</b><br>SECTIONS</span><span class="ac"><?= cs_ti_icon('pen') ?><?= cs_ti_icon('copy') ?><?= cs_ti_icon('trash', 'rd') ?></span></div></div><div class="tc k2"><div class="th"><span class="it"><?= cs_ti_icon('bug') ?></span><span class="pl">PEST CONTROL</span></div><div class="t5">Termite &amp; Timber Pest</div><p>Standard AS 4349.3 inspection focusing on timber-destroying…</p><div class="tf"><span><b data-k="s2">8</b><br>SECTIONS</span><span class="ac"><?= cs_ti_icon('pen') ?><?= cs_ti_icon('copy') ?><?= cs_ti_icon('trash', 'rd') ?></span></div></div><div class="tc k3"><div class="th"><span class="it"><?= cs_ti_icon('build') ?></span><span class="pl">COMMERCIAL</span></div><div class="t5">Industrial Facility Audit</div><p>Heavy-duty assessment for industrial plants, including safety</p><div class="tf"><span><b data-k="s3">24</b><br>SECTIONS</span><span class="ac"><?= cs_ti_icon('pen') ?><?= cs_ti_icon('copy') ?><?= cs_ti_icon('trash', 'rd') ?></span></div></div>
<div class="tc nwc"><span class="pls"><?= cs_ti_icon('plus') ?></span><b>Create New Template</b><small>Start from a blank canvas</small></div></div>
<hr>
<div class="bm"><div class="ra"><div class="t6">RECENT TEMPLATE ACTIVITY</div><div class="tal"><div style="--dc:#0a58b0">Residential Structural Template updated<small>By David Chen • 14 minutes ago</small></div><div style="--dc:#16a34a">New "Dilapidation Report" template created<small>By Sarah Williams • 2 hours ago</small></div><div style="--dc:#f59e0b">Pest Template version 2.4 archived<small>System Audit • Yesterday</small></div></div></div>
<div class="sd"><div><span class="tl2"><?= cs_ti_icon('chart') ?></span><small>TOTAL TEMPLATES</small><strong data-k="tpl">24</strong><span class="tu"><?= cs_ti_icon('arrow', '', 'transform:rotate(-45deg)') ?>12% increase this month</span></div>
<div><span class="tl2"><?= cs_ti_icon('list') ?></span><small>MOST USED</small><strong class="sx">Residential Standard</strong><span class="cp"><span data-k="used">1,240</span> inspections completed</span></div></div></div></div>
</div></div>
