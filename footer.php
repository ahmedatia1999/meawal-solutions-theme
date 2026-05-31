<?php

if (is_front_page()) {
    $footer_title = 'footer';
} else {
    $footer_title = 'footer';
}

$footer_query = new WP_Query(array(
    'post_type'      => 'footer',
    'posts_per_page' => 1,
    'post_title'     => $footer_title,
));

if ($footer_query->have_posts()) {
    while ($footer_query->have_posts()) : $footer_query->the_post();
        the_content();
    endwhile;
    wp_reset_postdata();
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/bootstrap.min.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/all.min.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/slick.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/wow.js"></script>
<script src="<?php echo THEME_URL . '/assets/'; ?>js/jquery.easing.min.js"></script>

<script src="<?php echo THEME_URL . '/assets/'; ?>js/partners.js"></script>
<script>
    new WOW().init();
</script>


<div class="cont-chatbot">
    <div class="chat-button" id="chatButton">
        <figure>
            <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.0834 51.4085C20.7512 53.3623 24.8444 54.3808 29 54.3737C43.0143 54.3737 54.375 43.0132 54.375 28.9993C54.375 14.9854 43.0143 3.62491 29 3.62491C14.9858 3.62491 3.62503 14.9854 3.62503 28.9993C3.62503 33.313 4.70044 37.3704 6.59511 40.9229C7.03716 41.7504 7.14112 42.7172 6.88511 43.6198L3.90294 54.1006L14.3864 51.1209C15.2888 50.8642 16.2555 50.9673 17.0834 51.4085ZM29 57.9986C24.2491 58.0054 19.57 56.84 15.3773 54.6057L3.84978 57.885C3.33231 58.032 2.78498 58.0382 2.26434 57.9028C1.7437 57.7675 1.26864 57.4956 0.888255 57.1152C0.507873 56.7349 0.235966 56.2598 0.100632 55.7392C-0.0347016 55.2186 -0.0285515 54.6712 0.118446 54.1538L3.39544 42.6266C1.15952 38.4327 -0.00677232 33.7519 2.9582e-05 28.9993C2.9582e-05 12.9844 12.9848 0 29 0C45.0153 0 58 12.9844 58 28.9993C58 45.0142 45.0153 57.9986 29 57.9986ZM18.125 23.5619C18.125 23.0812 18.316 22.6202 18.6559 22.2803C18.9958 21.9404 19.4568 21.7495 19.9375 21.7495H38.0625C38.5432 21.7495 39.0042 21.9404 39.3441 22.2803C39.6841 22.6202 39.875 23.0812 39.875 23.5619C39.875 24.0426 39.6841 24.5036 39.3441 24.8435C39.0042 25.1834 38.5432 25.3744 38.0625 25.3744H19.9375C19.4568 25.3744 18.9958 25.1834 18.6559 24.8435C18.316 24.5036 18.125 24.0426 18.125 23.5619ZM18.125 34.4367C18.125 33.956 18.316 33.495 18.6559 33.1551C18.9958 32.8152 19.4568 32.6242 19.9375 32.6242H30.8125C31.2932 32.6242 31.7542 32.8152 32.0941 33.1551C32.4341 33.495 32.625 33.956 32.625 34.4367C32.625 34.9174 32.4341 35.3784 32.0941 35.7183C31.7542 36.0582 31.2932 36.2491 30.8125 36.2491H19.9375C19.4568 36.2491 18.9958 36.0582 18.6559 35.7183C18.316 35.3784 18.125 34.9174 18.125 34.4367Z" fill="white" />
            </svg>
        </figure>
    </div>

    <div class="chat-widget" id="chatWidget">
        <div class="chat-header">
            <div class="chat-header-content">
                <div class="chat-avatar">
                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2026_321)">
                            <path d="M8.75 0C9.23398 0 9.625 0.391016 9.625 0.875V2.625H12.9062C13.9945 2.625 14.875 3.50547 14.875 4.59375V12.0312C14.875 13.1195 13.9945 14 12.9062 14H4.59375C3.50547 14 2.625 13.1195 2.625 12.0312V4.59375C2.625 3.50547 3.50547 2.625 4.59375 2.625H7.875V0.875C7.875 0.391016 8.26602 0 8.75 0ZM5.6875 10.5C5.44688 10.5 5.25 10.6969 5.25 10.9375C5.25 11.1781 5.44688 11.375 5.6875 11.375H6.5625C6.80312 11.375 7 11.1781 7 10.9375C7 10.6969 6.80312 10.5 6.5625 10.5H5.6875ZM8.3125 10.5C8.07187 10.5 7.875 10.6969 7.875 10.9375C7.875 11.1781 8.07187 11.375 8.3125 11.375H9.1875C9.42813 11.375 9.625 11.1781 9.625 10.9375C9.625 10.6969 9.42813 10.5 9.1875 10.5H8.3125ZM10.9375 10.5C10.6969 10.5 10.5 10.6969 10.5 10.9375C10.5 11.1781 10.6969 11.375 10.9375 11.375H11.8125C12.0531 11.375 12.25 11.1781 12.25 10.9375C12.25 10.6969 12.0531 10.5 11.8125 10.5H10.9375ZM7.21875 7C7.21875 6.70992 7.10352 6.43172 6.8984 6.2266C6.69328 6.02148 6.41508 5.90625 6.125 5.90625C5.83492 5.90625 5.55672 6.02148 5.3516 6.2266C5.14648 6.43172 5.03125 6.70992 5.03125 7C5.03125 7.29008 5.14648 7.56828 5.3516 7.7734C5.55672 7.97852 5.83492 8.09375 6.125 8.09375C6.41508 8.09375 6.69328 7.97852 6.8984 7.7734C7.10352 7.56828 7.21875 7.29008 7.21875 7ZM11.375 8.09375C11.6651 8.09375 11.9433 7.97852 12.1484 7.7734C12.3535 7.56828 12.4688 7.29008 12.4688 7C12.4688 6.70992 12.3535 6.43172 12.1484 6.2266C11.9433 6.02148 11.6651 5.90625 11.375 5.90625C11.0849 5.90625 10.8067 6.02148 10.6016 6.2266C10.3965 6.43172 10.2812 6.70992 10.2812 7C10.2812 7.29008 10.3965 7.56828 10.6016 7.7734C10.8067 7.97852 11.0849 8.09375 11.375 8.09375ZM1.3125 6.125H1.75V11.375H1.3125C0.587891 11.375 0 10.7871 0 10.0625V7.4375C0 6.71289 0.587891 6.125 1.3125 6.125ZM16.1875 6.125C16.9121 6.125 17.5 6.71289 17.5 7.4375V10.0625C17.5 10.7871 16.9121 11.375 16.1875 11.375H15.75V6.125H16.1875Z" fill="#0D7C7C" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2026_321">
                                <path d="M0 0H17.5V14H0V0Z" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="chat-title">
                    <h3><?php echo (get_locale() === 'en_US') ? 'Talk to us' : 'تحدث معنا'; ?></h3>
                    <div class="chat-status"><?php echo (get_locale() === 'en_US') ? 'We are at your service!' : 'نحن في خدمتك!'; ?></div>
                </div>
            </div>
            <div class="close-chat" id="closeChat">×</div>
        </div>

        <div class="chat-scroll-panel">
            <div class="chat-body" id="chatBody">
            <div class="bot-message">
                <div class="bot-message-header">
                    <div class="bot-icon">
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2026_321)">
                                <path d="M8.75 0C9.23398 0 9.625 0.391016 9.625 0.875V2.625H12.9062C13.9945 2.625 14.875 3.50547 14.875 4.59375V12.0312C14.875 13.1195 13.9945 14 12.9062 14H4.59375C3.50547 14 2.625 13.1195 2.625 12.0312V4.59375C2.625 3.50547 3.50547 2.625 4.59375 2.625H7.875V0.875C7.875 0.391016 8.26602 0 8.75 0ZM5.6875 10.5C5.44688 10.5 5.25 10.6969 5.25 10.9375C5.25 11.1781 5.44688 11.375 5.6875 11.375H6.5625C6.80312 11.375 7 11.1781 7 10.9375C7 10.6969 6.80312 10.5 6.5625 10.5H5.6875ZM8.3125 10.5C8.07187 10.5 7.875 10.6969 7.875 10.9375C7.875 11.1781 8.07187 11.375 8.3125 11.375H9.1875C9.42813 11.375 9.625 11.1781 9.625 10.9375C9.625 10.6969 9.42813 10.5 9.1875 10.5H8.3125ZM10.9375 10.5C10.6969 10.5 10.5 10.6969 10.5 10.9375C10.5 11.1781 10.6969 11.375 10.9375 11.375H11.8125C12.0531 11.375 12.25 11.1781 12.25 10.9375C12.25 10.6969 12.0531 10.5 11.8125 10.5H10.9375ZM7.21875 7C7.21875 6.70992 7.10352 6.43172 6.8984 6.2266C6.69328 6.02148 6.41508 5.90625 6.125 5.90625C5.83492 5.90625 5.55672 6.02148 5.3516 6.2266C5.14648 6.43172 5.03125 6.70992 5.03125 7C5.03125 7.29008 5.14648 7.56828 5.3516 7.7734C5.55672 7.97852 5.83492 8.09375 6.125 8.09375C6.41508 8.09375 6.69328 7.97852 6.8984 7.7734C7.10352 7.56828 7.21875 7.29008 7.21875 7ZM11.375 8.09375C11.6651 8.09375 11.9433 7.97852 12.1484 7.7734C12.3535 7.56828 12.4688 7.29008 12.4688 7C12.4688 6.70992 12.3535 6.43172 12.1484 6.2266C11.9433 6.02148 11.6651 5.90625 11.375 5.90625C11.0849 5.90625 10.8067 6.02148 10.6016 6.2266C10.3965 6.43172 10.2812 6.70992 10.2812 7C10.2812 7.29008 10.3965 7.56828 10.6016 7.7734C10.8067 7.97852 11.0849 8.09375 11.375 8.09375ZM1.3125 6.125H1.75V11.375H1.3125C0.587891 11.375 0 10.7871 0 10.0625V7.4375C0 6.71289 0.587891 6.125 1.3125 6.125ZM16.1875 6.125C16.9121 6.125 17.5 6.71289 17.5 7.4375V10.0625C17.5 10.7871 16.9121 11.375 16.1875 11.375H15.75V6.125H16.1875Z" fill="#0D7C7C" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2026_321">
                                    <path d="M0 0H17.5V14H0V0Z" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="message-text">
                        <?php echo (get_locale() === 'en_US')
                            ? 'Welcome to Solutions Consultancy.<br>We\'re pleased to assist you.<br>Please select your inquiry category below:'
                            : 'حياك الله في حلول للاستشارات.<br>يسعدنا خدمتك.<br>يرجى اختيار نوع الاستفسار من القائمة التالية:'; ?>
                        <div class="message-time"><?php echo (get_locale() === 'en_US') ? 'Now' : 'الآن'; ?></div>
                    </div>
                </div>

                <div class="chat-options">
                    <?php
                    // ── Welcome buttons: only show_in_welcome = 1 ──
                    $chatbot_lang     = (get_locale() === 'en_US') ? 'en' : 'ar';
                    $chatbot_opt_key  = ($chatbot_lang === 'en') ? 'chatbot_replies_list_en' : 'chatbot_replies_list';
                    $chatbot_welcome  = get_option($chatbot_opt_key, []);

                    // Fallback: if English list empty, use Arabic
                    if (empty($chatbot_welcome) && $chatbot_lang === 'en') {
                        $chatbot_welcome = get_option('chatbot_replies_list', []);
                    }

                    foreach ($chatbot_welcome as $row) {
                        // ✅ Only show rows that have show_in_welcome checked
                        if (empty($row['trigger']) || empty($row['show_in_welcome'])) continue;
                        echo '<button type="button" class="option-btn" data-type="trigger" data-msg="'
                            . esc_attr($row['trigger']) . '">'
                            . esc_html($row['trigger'])
                            . '</button>';
                    }
                    ?>
                </div>
            </div>
            </div>
            <div class="chat-busy-layer" id="chatBusyLayer" aria-hidden="true"></div>
        </div>

        <div class="chat-input">
            <div class="row-input-chat">
                <input type="text" class="message-input" id="messageInput"
                    placeholder="<?php echo (get_locale() === 'en_US') ? 'Type your message…' : 'اكتب رسالتك…'; ?>">
                <button type="button" class="send-btn" id="sendBtn"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Contact option buttons (phone / whatsapp / email) */
    .option-btn-contact {
        display: inline-block;
        text-decoration: none !important;
        color: inherit !important;
        cursor: pointer;
        /* inherits .option-btn styles from your stylesheet */
    }

    /* Capture clicks during AJAX — pointer-events:none on buttons passes clicks behind the widget */

    .chat-scroll-panel {
        flex: 1;
        min-height: 0;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .chat-scroll-panel .chat-body {
        flex: 1;
        min-height: 0;
        overflow-y: auto;
        position: relative;
    }

    .chat-busy-layer {
        display: none;
        position: absolute;
        inset: 0;
        z-index: 50;
        cursor: progress;
        background: transparent;
    }

    #chatWidget.chat-loading .chat-busy-layer {
        display: block;
    }

    #chatWidget.chat-loading #sendBtn {
        opacity: 0.85;
    }
</style>

<?php wp_footer(); ?>

<script>
    $(document).ready(function() {

        if (window.scChatbotFooterBound) {
            return;
        }
        window.scChatbotFooterBound = true;

        /* ── open / close ── */
        $('#chatButton').click(function() {
            $('#chatWidget').addClass('active');
            $(this).hide();
        });

        $('#closeChat').click(function() {
            $('#chatWidget').removeClass('active');
            $('#chatButton').show();
            $('#emojiPicker').removeClass('active');
        });

        $('#emojiBtn').click(function(e) {
            e.stopPropagation();
            $('#emojiPicker').toggleClass('active');
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#emojiPicker, #emojiBtn').length) {
                $('#emojiPicker').removeClass('active');
            }
        });

        $(document).on('click', '.emoji-item', function() {
            const emoji = $(this).text();
            const input = $('#messageInput');
            input.val(input.val() + emoji);
            input.focus();
        });

        /* ══════════════════════════════════════════════════════════
           renderOptions – builds button HTML from API options array.
           Each item: { type, value, label, href }
             type=trigger  → regular chat button
             type=phone    → <a href="tel:...">
             type=whatsapp → <a href="https://wa.me/..." target="_blank">
             type=email    → <a href="mailto:...">
        ══════════════════════════════════════════════════════════ */
        function renderOptions(options) {
            if (!options || !options.length) return '';

            let html = '<div class="bot-options">';

            options.forEach(function(opt) {

                // Legacy: plain string (old API format)
                if (typeof opt === 'string') {
                    html += `<button type="button" class="option-btn" data-type="trigger" data-msg="${escHtml(opt)}">${escHtml(opt)}</button>`;
                    return;
                }

                const type = String(opt.type || 'trigger').toLowerCase();
                const label = escHtml(opt.label || opt.value || '');
                let href = String(opt.href || '').trim();

                if (type === 'trigger') {
                    html += `<button type="button" class="option-btn" data-type="trigger" data-msg="${escHtml(opt.value)}">${label}</button>`;

                } else if (type === 'phone') {
                    if (!href) return;
                    html += `<a class="option-btn option-btn-contact option-btn-phone" href="${escHtml(href)}" data-phone="${escHtml(opt.value || '')}">📞 ${label}</a>`;

                } else if (type === 'whatsapp') {
                    if (!href || !/^https?:\/\//i.test(href)) return;
                    html += `<a class="option-btn option-btn-contact option-btn-wa" href="${escHtml(href)}" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp" style="color: green; font-size: 20px;"></i> ${label}</a>`;

                } else if (type === 'email') {
                    if (!href || !/^mailto:/i.test(href)) return;
                    html += `<a class="option-btn option-btn-contact option-btn-email" href="${escHtml(href)}">✉️ ${label}</a>`;
                }
            });

            html += '</div>';
            return html;
        }

        /* ── escape helper ── */
        function escHtml(s) {
            return String(s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;')
                .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        /* ── send message to WP REST API ── */
        function sendMessage(message, retryCount, appendUserBubble, seq) {
            if (!message.trim()) return;

            if (typeof window.sc === 'undefined' || !window.sc.chatbot_rest_url) {
                const langEn = typeof window.sc !== 'undefined' && window.sc.chatbot_lang === 'en';
                const errBootstrap = langEn
                    ? 'Unable to reach the assistant. Reload the page and try again.'
                    : 'تعذّر الاتصال بالمساعد. حدّث الصفحة وحاول مجدداً.';
                $('#chatBody').append(`
                    <div class="bot-message">
                        <div class="bot-message-header">
                            <div class="message-text">${escHtml(errBootstrap)}</div>
                        </div>
                    </div>
                `);
                $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
                $('#chatWidget').removeClass('chat-loading');
                $('#chatBusyLayer').removeAttr('aria-busy').attr('aria-hidden', 'true');
                return;
            }
            if (typeof retryCount === 'undefined') retryCount = 0;
            if (typeof appendUserBubble === 'undefined') appendUserBubble = true;

            if (seq == null) {
                window.scChatSeq = (window.scChatSeq || 0) + 1;
                seq = window.scChatSeq;
            }

            if (appendUserBubble) {
                $('#chatBody').append(`<div class="user-message">${escHtml(message)}</div>`);
                $('#messageInput').val('');
                $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
            }

            $('#chatWidget').addClass('chat-loading');
            $('#chatBusyLayer').attr('aria-busy', 'true');

            $.ajax({
                url: sc.chatbot_rest_url,
                method: 'POST',
                dataType: 'json',
                timeout: 12000,
                data: {
                    message: message,
                    lang: sc.chatbot_lang
                },
                success: function(res) {
                    try {
                        if (seq !== window.scChatSeq) return;

                        const replyHtml = (res && res.reply != null) ? res.reply : '';
                        $('#chatBody').append(`
                    <div class="bot-message">
                        <div class="bot-message-header">
                            <div class="message-text">${replyHtml}</div>
                        </div>
                    </div>
                `);

                        if (res && res.options && res.options.length > 0) {
                            $('#chatBody').append(renderOptions(res.options));
                        }

                        $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
                    } finally {
                        if (seq === window.scChatSeq) {
                            $('#chatWidget').removeClass('chat-loading');
                            $('#chatBusyLayer').removeAttr('aria-busy').attr('aria-hidden', 'true');
                        }
                    }
                },
                error: function(xhr) {
                    const status = Number(xhr?.status || 0);
                    const shouldRetry = retryCount < 1 && (status === 0 || status >= 500);
                    if (shouldRetry) {
                        setTimeout(function() {
                            sendMessage(message, retryCount + 1, false, seq);
                        }, 700);
                        return;
                    }
                    if (seq !== window.scChatSeq) return;

                    const errText = (sc && sc.chatbot_lang === 'en')
                        ? 'Something went wrong. Please try again.'
                        : 'حدث خطأ، حاول مرة أخرى.';
                    $('#chatBody').append(`
                    <div class="bot-message">
                        <div class="bot-message-header">
                            <div class="message-text">${escHtml(errText)}</div>
                        </div>
                    </div>
                `);
                    $('#chatWidget').removeClass('chat-loading');
                    $('#chatBusyLayer').removeAttr('aria-busy').attr('aria-hidden', 'true');
                }
            });
        }

        /* ── input handlers ── */
        $('#sendBtn').on('click', function(e) {
            e.preventDefault();
            if ($('#chatWidget').hasClass('chat-loading')) return;
            sendMessage($('#messageInput').val());
        });

        $('#messageInput').on('keydown', function(e) {
            if (e.which !== 13 && e.keyCode !== 13) return;
            e.preventDefault();
            if ($('#chatWidget').hasClass('chat-loading')) return;
            sendMessage($(this).val());
        });

        /* Trigger options: only real <button> (never <a> contact links) */
        $(document).on('click', 'button.option-btn[data-type="trigger"]', function(e) {
            e.preventDefault();
            if ($('#chatWidget').hasClass('chat-loading')) return;
            const msg = $(this).attr('data-msg');
            if (msg) sendMessage(msg);
        });

        /* Desktop fallback for tel: links */
        $(document).on('click', 'a.option-btn-phone', async function(e) {
            const isDesktop = !/Android|iPhone|iPad|iPod|IEMobile|Opera Mini/i.test(navigator.userAgent || '');
            if (!isDesktop) return;

            e.preventDefault();

            const phone = String($(this).data('phone') || '').trim();
            if (!phone) return;

            try {
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    await navigator.clipboard.writeText(phone);
                }
            } catch (e) {
                // ignore clipboard errors and still show helpful message
            }

            const msg = (sc && sc.chatbot_lang === 'en')
                ? `Your device may not support direct calling. Number copied: ${phone}`
                : `قد لا يدعم جهازك الاتصال المباشر. تم نسخ الرقم: ${phone}`;

            $('#chatBody').append(`
                <div class="bot-message">
                    <div class="bot-message-header">
                        <div class="message-text">${escHtml(msg)}</div>
                    </div>
                </div>
            `);
            $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
        });

    });
</script>

<script>
    jQuery(function($) {

        // remove active when click another area
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.section_areas_excellence .nav-item').length) {
                $('.section_areas_excellence .nav-item').removeClass('active');
            }
        });

        $('.section_areas_excellence').each(function() {

            const $root = $(this);
            const widgetID = $root.data('widget');

            $root.find('.nav-item').removeClass('active');

            $root.on('click, mouseenter', '.nav-item', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const $this = $(this);
                const section = String($this.data('section')).trim();
                const isActive = $this.hasClass('active');

                if (isActive) return;

                if (section === 'section1' || section === 'section2') {
                    if (isActive) {
                        $this.removeClass('active');
                    } else {
                        $this.addClass('active').siblings('.nav-item').removeClass('active');
                        $root.find('.item-area.service-details').show();
                        $root.find('.cont-carousel').hide();
                    }
                    return;
                }

                if (section === 'section3' || section === 'section4' || section === 'section5') {
                    $this.addClass('active').siblings('.nav-item').removeClass('active');
                    $root.find('.item-area.service-details').hide();
                    $root.find('.cont-carousel').hide();
                    $root.find('.cont-carousel.' + section).show();
                    setTimeout(() => {
                        window.dispatchEvent(new Event('resize'));
                    }, 500);
                }
            });
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".service-cards", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2,
            slideShadows: true,
        },
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".service-cards .swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".service-cards .swiper-button-next",
            prevEl: ".service-cards .swiper-button-prev",
        },
    });
</script>

</body>

</html>
