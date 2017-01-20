<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> post clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="meta post-info">
    <?php if ($display_submitted): ?>
      <div class="meta submitted">
        <?php print $submitted; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <div><?php print 'Day of week : '.$day_of_week; ?></div>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
    ?>
  </div>

  <?php
  // Remove the "Add new comment" link on the teaser page or if the comment
  // form is being displayed on the same page.
  if ($teaser || !empty($content['comments']['comment_form'])) {
    unset($content['links']['comment']['#links']['comment-add']);
  }
  // Only display the wrapper div if there are links.
  $links = render($content['links']);
  if ($links):
    ?>
    <div class="link-wrapper postmeta">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
  