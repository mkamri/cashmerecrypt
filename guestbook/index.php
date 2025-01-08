<?php
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $submitMessage = '';
    if(isset($_POST['name']))
    {
        // handle honeypot
        $oops = $_POST['lastName'] != null || $_POST['phone'] != null;
        if($oops)
        {
            $submitMessage = 'Thanks for signing my guestbook! Your message has been sent to the webmistress for review.';
        }
        else
        {
            $name = trim(htmlspecialchars($_POST['name']));
            $email = trim(htmlspecialchars($_POST['email']));
            $siteURL = trim(htmlspecialchars($_POST['siteURL']));
            $message = trim(htmlspecialchars($_POST['message']));

            if(!$name || $name == '' || !$message || $message == '')
            {
                $submitMessage = 'Please fill in all required fields.';
            }
            else
            {
                $submitMessage = create_guestbook_post($name, $email, $siteURL, $message);
            }
        }
    }

    $guestbookPosts = get_guestbook_posts();

?>

<div class="grid container">

    <?php if($submitMessage != ''): ?>
        <div class="text-bruised bg-pictochat padding">
            <p>⊹°｡⋆｡°⊹</p>
            <p><?= $submitMessage ?></p>
            <span>⊹°｡⋆｡°⊹</span>
        </div>
    <?php endif; ?>
    <div class="text-bruised bg-chapped padding">
        <h1><a href="/">☜</a> guestbook</h1>
    </div>
    <div class="bg-pictochat text-crypt padding">
        <p>⊹°｡⋆｡°⊹</p>
        <h2>sign my guestbook</h2>
        <form method="POST" autocomplete="off" class="grid">
            <div>
                <label>
                    name
                    <input type="text" 
                           maxlength="20" 
                           name="name"
                           required="required"
                           autocorrect="off" 
                           autocapitalize="none"
                           />
                </label>
            </div>
            <div class="hidden">
                <label>
                    last name
                    <input type="text"
                           maxlength="20"
                           name="lastName"
                           autocorrect="off" 
                           autocapitalize="none"
                           />
                </label>
            </div>
            <div class="hidden">
                <label>
                    phone number
                    <input type="text"
                           maxlength="20"
                           name="phone"
                           autocorrect="off" 
                           autocapitalize="none"
                           />
                </label>
            </div>
            <div class="grid grid-cols-2">
                <div>
                    <label>
                        email (optional)
                        <input type="text" 
                            maxlength="258" 
                            name="email"
                            autocorrect="off" 
                            autocapitalize="none"
                            />
                    </label>
                    <span><em>Only the webmistress will see your email</em></span>
                </div>
                <div>
                    <label>
                        site url (optional)
                        <input type="text"
                            maxlength="200"
                            name="siteURL"
                            autocorrect="off" 
                            autocapitalize="none"
                            />
                    </label>
                </div>
            </div>
            <div>
                <label>
                    message
                    <textarea maxlength="350"
                              name="message"
                              required="required"
                              ></textarea>
                </label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php foreach($guestbookPosts as $post): 
        $date = new DateTime($post['CreatedOn'], new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone('America/New_York'));
    ?>
        <div class="padding bg-ghost text-bruised">
            <p>⊹°｡⋆｡°⊹</p>
            <div class="flex justify-between flex-wrap">
                <p class="mb-0">
                    <strong><?= $post['Name'] ?></strong>
                </p>
                <p class="mb-0">
                    <strong>
                        <?= $date->format('F j, Y @ g:i a') ?> EST
                    </strong>
                </p>
            </div>
            <?php if($post['SiteURL']): ?>
                <p class="mt-0">
                    website: <a href="<?= $post['SiteURL'] ?>"><?= $post['SiteURL'] ?></a>
                </p>
            <?php endif; ?>
            <p>
                <?= nl2br($post['Message']) ?>
            </p>
            <p>⊹°｡⋆｡°⊹</p>
        </div>
    <?php endforeach; ?>
</div>