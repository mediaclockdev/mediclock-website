<?php
/* * Total Inspections — admin portal dashboard, drawn in HTML so it stays sharp
   at any size (styled by .cs-mock in case-study.css; the numbers and lists
   tick over in assets/js/case-studies/total-inspections.js) */
include_once __DIR__ . '/icons.php';
?>
<div class="cs-mock" style="--vw:140">
<div class="as"><b class="lo">TOTAL<br>INSPECTIONS</b><span class="ap">ADMIN PORTAL</span><span class="ts">Total Inspections</span>
<ul><li class="on"><?= cs_ti_icon('dash') ?>DASHBOARD</li><li><?= cs_ti_icon('tree') ?>TEMPLATES</li><li><?= cs_ti_icon('pal') ?>BRANDING</li><li><?= cs_ti_icon('doc') ?>REPORTS</li>
</ul><div class="nw"><?= cs_ti_icon('plus') ?>NEW INSPECTION</div>
</div>
<div class="mn">
<div class="tb"><span class="sr"><?= cs_ti_icon('search') ?>Search records, inspectors, or reports...</span><span class="bl"><?= cs_ti_icon('bell') ?><u></u></span><span class="us"><span>Alex Stratton<small>SYSTEM ADMIN</small></span><span class="avt"></span></span></div>
<div class="pd">
<div class="tr"><div><div class="t4">Dashboard Overview<span class="lv"><u></u>LIVE</span></div><div class="sub">Real-time operational status for Total Inspections.</div></div><div class="bt"><i class="gy"><?= cs_ti_icon('cal') ?>Last 30 Days</i><i class="bp"><?= cs_ti_icon('dl') ?>Export PDF</i></div></div>
<div class="st"><div class="c b"><span class="tl"><?= cs_ti_icon('clip') ?></span><span class="tg" data-k="gr">+12.4%</span><small>TOTAL INSPECTIONS</small><strong data-k="total">1,429</strong><em>Calculated for the current month</em><?= cs_ti_icon('clip', 'wm') ?></div><div class="c o"><span class="tl"><?= cs_ti_icon('user') ?></span><span class="tg" data-k="cap" style="color:#d97706">88% Capacity</span><small>ACTIVE INSPECTORS</small><strong data-k="insp">42</strong><em><span data-k="site">6</span> currently on-site across regions</em><?= cs_ti_icon('user', 'wm') ?></div><div class="c g"><span class="tl"><?= cs_ti_icon('bolt') ?></span><span class="tg">Stable</span><small>SYSTEM UPTIME</small><strong data-k="up">99.98%</strong><em>Reports generation engine status</em><?= cs_ti_icon('bolt', 'wm') ?></div><div class="c hi"><span class="tl"><?= cs_ti_icon('badge') ?></span><span class="tg">Target: 95%</span><small>COMPLIANCE STATUS</small><strong data-k="comp">96.4%</strong><em>Reports finalised on schedule</em><?= cs_ti_icon('badge', 'wm') ?></div></div>
<div class="gr"><div>
<div class="pn"><div class="ph"><div><div class="t5">Inspections by Category</div><p>Volume distribution per structural type</p></div><?= cs_ti_icon('pie') ?></div>
<div class="bars"><div><span>Residential Standard</span><em data-k="c0">582</em><u><s data-b="0" style="width:72%;background:#0a58b0"></s></u></div><div><span>Pest &amp; Termite</span><em data-k="c1">410</em><u><s data-b="1" style="width:51%;background:#3d86d8"></s></u></div><div><span>Commercial Facilities</span><em data-k="c2">284</em><u><s data-b="2" style="width:35%;background:#5b9bd5"></s></u></div><div><span>Pre-Purchase Audit</span><em data-k="c3">153</em><u><s data-b="3" style="width:19%;background:#4a4f57"></s></u></div></div>
<div class="bn"><span class="th2"></span><div><b>New Inspection Template</b>The "Industrial Complex v4.2" template was successfully deployed. All inspectors have been notified of the update.</div><?= cs_ti_icon('arrow') ?></div></div>
<div class="pn rp"><div class="t5">Recent Reports Compliance</div><div class="rt hd2"><span>REPORT ID</span><span>INSPECTOR</span><span>CATEGORY</span><span>TIMELINE</span><span style="justify-self:end">STATUS</span></div><div class="rtb"><div class="rt"><b>#TI-90412</b><span>Marcus Vane</span><span>Residential</span><span>2.4h turnaround</span><span class="ok">PASSED</span></div><div class="rt"><b>#TI-89211</b><span>Sarah Jenkins</span><span>Commercial</span><span>4.8h turnaround</span><span class="ok">PASSED</span></div><div class="rt"><b>#TI-88764</b><span>Tom Halloway</span><span>Pest Control</span><span>6.1h turnaround</span><span class="lt">LATE</span></div></div></div>
</div><div>
<div class="act"><div class="t5">System Activity</div><div class="al"><div><b>New branding assets uploaded</b><span>Corporate marketing package</span><small>14 MINUTES AGO</small></div><div><b>API Key Rotation</b><span>Security protocol completed for AWS instances.</span><small>2 HOURS AGO</small></div><div><b>Regional Server Sync</b><span>Australia East database mirrored successfully.</span><small>20 HOURS AGO</small></div><div><b>Legacy template archived</b><span>"Standard House" moved to cold storage.</span><small>2 DAYS AGO</small></div></div><div class="vl">View Full System Log</div></div>
<div class="tip"><?= cs_ti_icon('bulb') ?><div class="t5">Optimisation Tip</div><p>Switching to the new "Neural Image Tagger" can reduce report finalisation time by an average of 18%.</p><u>Configure Settings</u></div></div></div></div>
</div></div>
