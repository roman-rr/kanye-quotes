@props([ 'model' => '', 'pageLength' => '', 'childCommentsVisible' => ''])

<!-- styles -->
<style>
    @php
        $childCommentsVisibleCss = $childCommentsVisible + 1
    @endphp

    .comments-list .comment.child-collapsed .comment:nth-child(n+{{$childCommentsVisibleCss}}) {
        display: none;
    }
</style>

<!-- components -->
<div id="comments-container-{{$model}}">
    <div class="loading-spinner text-center">
        <span class="spinner-border text-primary align-middle mt-5"></span>
    </div>

    <button class="btn mt-5 mb-5 btn-secondary w-100 text-center d-none more-comments">
        <span class="indicator-label">{{__('Load Previous')}}</span>
        <span class="indicator-progress">
            {{ __('Loading...')}} 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>

    <div class="comments-list"></div>

    <x-basic.comment.reply class="pt-10 base" />
</div>

<!-- scripts -->
<script>
let CommentsServerSide_{{$model}} = function() {
    
    const commentTemplate = `<x-comment.comment />`;
    const apiUrl = '/api/{{$model}}s/{{request()->id}}/comments';
    const pageLength = {{$pageLength}};
    const childCommentsVisible = {{$childCommentsVisible}};

    let commentsList, 
        loader, 
        buttonMoreComments, 
        comments,
        currentPage,
        inputMessageSendLoader;
    
    /**
     * A type of constructor
     * for non-objective-oriented JavaScript
     */
    let __constructor = () => {
        commentsContainer = document.querySelector('#comments-container-{{$model}}');
        commentsList = commentsContainer.querySelector('.comments-list');
        loader = commentsContainer.querySelector('.loading-spinner');
        buttonMoreComments = commentsContainer.querySelector('button.more-comments');
        let replyForm = commentsContainer.querySelector('.reply-form.base');
        inputMessage = replyForm.querySelector('textarea');
        
        currentPage = 1;
        comments = [];
        
        // init listeners
        buttonMoreComments.addEventListener('click', () => loadMore());
        attachReplyFormListeners(replyForm, inputMessage);
    }

    let getComments = async(page = 1) => {
        let res = await fetch(`${apiUrl}?length=${pageLength}&page=${page}&model_type={{$model}}`);
        res = await res.json();
        console.log('comments', res);
        
        loader.classList.add('d-none');
        if (res.next_page_url) {
            buttonMoreComments.classList.remove('d-none');
        } else {
            buttonMoreComments.classList.add('d-none');
        }

        comments = res.data;
        currentPage = res.current_page;
    }

    let sendComment = async(replyFormEl) => {
        let sendBtn = replyFormEl.querySelector('button.btn-send');
        let sendLoaderBtn = replyFormEl.querySelector('button.btn-send-loader');
        let textarea = replyFormEl.querySelector('textarea');
        let isChild = !!replyFormEl.classList.contains('child');
        let parentCommentEl, parentId, lastComment, showAllButton;

        if (isChild) {
            parentCommentEl = replyFormEl.parentElement.parentElement;
            parentId = parentCommentEl.getAttribute('comment-id');
            showAllButton = parentCommentEl.querySelector(`.show-all-child-comments`);
        }

        sendLoaderBtn.classList.remove('d-none');
        sendBtn.classList.add('d-none');

        let respond = await fetch(apiUrl + '/?model_type={{$model}}', {
                method: 'POST',
                body: JSON.stringify({
                    comment: textarea.value, 
                    user_id: {{ request()->user()->id }},
                    comment_id: parentId
                }),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                }
            }
        )
        body = await respond.json();

        // hide loaders
        sendLoaderBtn.classList.add('d-none');
        sendBtn.classList.remove('d-none');

        // error
        if (respond.status !== 201) {
            throw body.message;
            return;
        }

        console.warn('Created 201', body);
        
        textarea.value = '';
        sendBtn.setAttribute('disabled', true);

        if (isChild) {
            parentCommentEl.classList.remove('child-collapsed');
            if (showAllButton) showAllButton.remove();
            replyFormEl.remove();   
        }

        attachNewComment(body, parentCommentEl);
    }

    let attachNewComment = (comment, parentEl) => {
        comment.created_at_formatted = '{{__("Now")}}';
        let element = interpolateCommentTemplate(comment);

        if (!parentEl) {
            // Render main comment
            commentsList.insertAdjacentHTML('beforeend', element);
            let newComment = commentsList.querySelector(`#comment-${comment.id}`);
            newComment.insertAdjacentHTML('beforeend', '<div class="child-comments ms-20"></div>');
        } else {
            // Render child comment
            let childCommentsContainer = parentEl.querySelector(`.child-comments`);
            let childComments = childCommentsContainer.querySelectorAll(`.comment`);
            if (childComments.length) {
                let lastComment = childComments[childComments.length - 1];
                lastComment.insertAdjacentHTML('afterend', element);
            } else {
                childCommentsContainer.insertAdjacentHTML('beforeend', element);
            }
        }
        attachCommentListeners(comment.id);
    }

    let renderComments = async() => {
        // Render base
        comments.forEach(item => {
            let element = interpolateCommentTemplate(item);
            commentsList.insertAdjacentHTML('afterbegin', element);

            let childElements = '<div class="child-comments ms-20">';
            item.comments.forEach(child => childElements += interpolateCommentTemplate(child));
            childElements += `<button class="btn btn-sm mt-4 btn-secondary w-100 text-center show-all-child-comments ${item.comments.length <= childCommentsVisible ? 'd-none' : ''}">
                               {{__('Show All')}}
                            </button>`;
            childElements += '</div>';
            let parentComment = document.querySelector(`#comment-${item.id}`);
            parentComment.insertAdjacentHTML('beforeend', childElements);

            // listeners to parent comment
            attachCommentListeners(item.id);
            // listeners to child comments
            item.comments.forEach(child => attachCommentListeners(child.id, true));
        });
    }

    let interpolateCommentTemplate = (comment) => {
        let element = commentTemplate;
        comment.link = ('{{route('users.show', 0)}}').replace(0, comment.user.id);

        // Interpolation for templates
        element = element.replace(/{comment_id}/g, comment.id)
            .replace('{first_name}', comment.user.contact.first_name)
            .replace('{last_name}', comment.user.contact.last_name)
            .replace('{comment_date}', comment.created_at_formatted)
            .replace('{comment_text}', comment.comment)
            .replace('{user_href}', comment.link)
            .replace('{profile_photo_path}', comment.user.profile_photo_path)
            .replace('{reply}', comment.comment_id ? 'd-none' : '')
            .replace('{remove}', comment.user.id !== {{{request()->user()->id}}} ? 'd-none' : 'button-remove')
            .replace('{child_collapsed}', !comment.comment_id ? 'child-collapsed' : '');

        return element;
    }

    let loadMore = async() => {
        let indicatorProgress = buttonMoreComments.querySelector('.indicator-progress');
        let indicatorLabel = buttonMoreComments.querySelector('.indicator-label');

        indicatorProgress.classList.add('d-block');
        indicatorLabel.classList.add('d-none');
        await getComments(currentPage + 1);
        indicatorProgress.classList.remove('d-block');
        indicatorLabel.classList.remove('d-none');

        renderComments();
    }

    let attachCommentListeners = async(id, isChild) => {
        let commentEl = document.querySelector(`#comment-${id}`);

        // remove
        let removeButton = commentEl.querySelector(`.button-remove`);
        if (removeButton) {
            removeButton.addEventListener('click', (ev) => handleDeleteComment(id));
        }

        if (isChild) {
            return;
        }

        // show all
        let buttonShowAllChildComments = commentEl.querySelector(`button.show-all-child-comments`);
        if (buttonShowAllChildComments) {
            buttonShowAllChildComments.addEventListener('click', (ev) => {
                commentEl.classList.remove('child-collapsed');
                buttonShowAllChildComments.remove();
            });
        }

        // reply
        let replyButton = commentEl.querySelector(`.button-reply`);
        replyButton.addEventListener('click', (ev) => handeReplyComment(commentEl));
    }

    let attachReplyFormListeners = async(replyFormEl, textareaEl) => {
        let inputMessageSend = replyFormEl.querySelector('button.btn-send');

        textareaEl.addEventListener('blur', (ev) => {
            if (textareaEl.value.length) return;
            replyFormEl.remove();
        });
        inputMessageSend.addEventListener('click', async(ev) => sendComment(replyFormEl));
        textareaEl.addEventListener('input', (val) => {
            if (textareaEl.value.length < 3) {
                inputMessageSend.setAttribute('disabled', true);
            } else {
                inputMessageSend.removeAttribute('disabled');
            }
        });
    }

    // Handle show-more button
    let checkShowMoreButton = (isDelete, id) => {
        if (isDelete) {
            let commentsParent = document.querySelector(`.child-comments:has(#comment-${id})`);
            if (!commentsParent) {
                return;
            }

            let childComments = commentsParent.querySelectorAll(`.comment`);
            
            if (commentsParent && (childComments.length - 1)<= childCommentsVisible) {
                let showAllButton = commentsParent.querySelector(`.show-all-child-comments`);
                if (showAllButton) {
                    showAllButton.classList.add('d-none');
                }
            }
        }
    }

    let handleDeleteComment = async(id) => {
        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
        let modal = await Swal.fire({
            text: "Are you sure you want to delete comment #" + id + "?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        });

        if (modal.value) {
            let commentEl = document.querySelector(`#comment-${id}`);
            let commentLoaderEl = commentEl.querySelector('.comment-loader');
            commentLoaderEl.classList.remove('d-none');

            let res = await fetch(`${apiUrl}/${id}/?model_type={{$model}}`, {method: 'DELETE'});
            commentLoaderEl.classList.add('d-none');

            // Removed
            if (res.status === 204) {
                console.warn('204 Removed');
                checkShowMoreButton(true, id);
                commentEl.remove();
                return;
            }

            // Errors
            body = await res.json();
            throw body.message;
        }
    }

    let handeReplyComment = async(commentEl) => {
        let childContainer = commentEl.querySelector('.child-comments');

        if (childContainer.querySelector('.reply-form.child')) {
            return;
        }

        // attach DOM
        childContainer.insertAdjacentHTML('beforeend', `<x-basic.comment.reply class="pt-10 child" />`);
        let childReplyForm = childContainer.querySelector('.reply-form.child');
        let childTextarea = childContainer.querySelector('.reply-form.child textarea');

        // init    
        autosize(childTextarea);
        childTextarea.focus();

        // attach events
        attachReplyFormListeners(childReplyForm, childTextarea);
    }

    // Public methods
    return {
        init: async() => {
            __constructor();
            await getComments();
            renderComments();
        }
    }
}();

CommentsServerSide_{{$model}}.init();
</script>