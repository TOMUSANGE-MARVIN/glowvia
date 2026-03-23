@if ($item->item_type === 'bundle' && !empty($item->reference))
  <div class="mt-1">
    <a href="javascript:void(0)"
       class="text-primary text-decoration-none small"
       onclick="showBundleDetails({{ $item->id }}, {{ json_encode($item->reference) }})"
       title="Click to view bundle product details">
      <i class="bi bi-box-seam me-1"></i>Contains {{ count($item->reference['bundles'] ?? []) }} item(s)
    </a>
  </div>
@endif
