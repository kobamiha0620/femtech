<div id="comment-area" class="comment-area">
    <?php 

    
    // ここからコメントフォーム
    $comments_args = array(
        'fields' => array(
            'author' => '<p class="comment-form-author">' . '<label for="author"> ' . ( $req ? ' <span class="required">*</span>' : '' ) . __( 'Name' ) . '</label> ' . '<input id="author" name="author" type="text" placeholder="名前を入力してください。" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
            'email'  => '<p class="comment-form-email">' . '<label for="email"> '  . ( $req ? ' <span class="required">*</span>' : '' ) . __( 'Email' ) . '</label> ' . '<input id="email" name="email" type="text" placeholder="メールアドレスを入力してください。" value="'  . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>',
            'url'    => '',
        ),
        'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required" placeholder="コメントを入力してください。"></textarea></p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => ''
      );


    comment_form($comments_args); 
    ?>
    <p class="comment-note">メールアドレスが公開されることはありません。<br>* が付いている欄は必須項目です。</p>
    </div>


    <div class="comment-respond">
    <?php 

    // コメントフォームここまで

    // コメントリストの表示
    if(have_comments()):
        ?>
            <ol class="commets-list">
            <?php wp_list_comments('callback=custom_comment_list'); ?>
            </ol>
        <?php
        endif;
    ?>
</div>