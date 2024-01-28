<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 3000; bottom: 50px !important;">
  <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger text-white">
      <strong class="me-auto">Error</strong>
      <small></small>
      <button type="button" class="btn-close text-white" onclick="hideToast()" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <?php echo $message; ?>
    </div>
  </div>
</div>

<script>
function hideToast() {
    const toast = document.querySelector('#liveToast')
    toast.classList.add('hide')
    toast.classList.remove('show')
}
</script>
