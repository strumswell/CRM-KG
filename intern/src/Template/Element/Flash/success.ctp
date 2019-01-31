<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><b>Super! </b><?= $message ?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>