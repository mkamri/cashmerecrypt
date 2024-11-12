<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');

    $activity = getGuildActivity();
    $member = $activity[1];
?>
    <div class="container grid">
        <div class="grid grid-cols-2">
            <section>
                <img src="/img/coords/egl/7.jpg" class="scale-down">
            </section>
            <div class="grid">
                <section class="padding bg-crypt">
                    <h2>about me</h2>
                    <ul>
                        <li>
                            <strong>name:</strong> Mika
                        </li>
                        <li>
                            <strong>birthday:</strong> May 8, 1995
                        </li>
                        <li>
                            <strong>location:</strong> Ohio, USA
                        </li>
                        <li>
                            <strong>astro:</strong> Taurus Sun | Virgo Moon | Sagittarius Rising
                        </li>
                        <li>
                            <strong>status:</strong> Married
                        </li>
                        <li>
                            <a href="/diary" class="text-pictochat">read my diary</a>
                        </li>
                    </ul>
                </section>
                <section class="bg-chapped padding text-bruised border-bruised">
                    <?php foreach($member['subclassXP'] as $subclass): ?>
                        <div class="skilltree--container" title="1 XP = 1 hour of practice">
                            <div class="skilltree--header">
                                <p><?= $subclass['class'] ?></p>
                                <p>Level <?= (int)(($subclass['totalXP'] / 1000) < 1 ? 1 : $subclass['totalXP'] / 1000 ) ?></p>
                            </div>
                            <div class="skilltree--bar">
                                <div class="skilltree--bar-filler"
                                        style="--skilltree-percent: <?= (($subclass['totalXP'] > 100000 ? 10000 : ($subclass['totalXP'] / 10)) / 10000) * 100 ?>%">
                                </div>
                                <div class="skilltree--bar-text">
                                    <?= number_format($subclass['totalXP'] / 10) ?> / 10,000
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
        <div class="grid grid-cols-3">
            <div class="padding bg-bruised">
                <h2><3</h1>
                <ul>
                    <li>bread</li>
                    <li>soft fabrics</li>
                    <li>old tattoos</li>
                    <li>jasmine</li>
                    <li>paper products</li>
                    <li>nail polish</li>
                </ul>
            </div>
            <div class="padding bg-ghost text-bruised">
                <h2><\3</h2>
                <ul>
                    <li>tinny noises</li>
                    <li>slimy food</li>
                    <li>liars</li>
                    <li>polyester</li>
                    <li>sunny days</li>
                    <li>small talk</li>
                </ul>
            </div>
            <div>
                <div class="padding bg-kuromi text-bruised">
                    <h2>hobbies</h2>
                    <p>drawing & painting, cooking, magic: the gathering, coding, sewing, twilight nature walks, video games</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div>
                <div class="padding bg-chapped text-bruised">
                    <h2>anime & manga</h2>
                    <p>currently watching: dandandan</p>
                    <p>paradise kiss, madoka magica, nana, oshi no ko, frieren, ouran high school host club, black butler (manga)</p>
                </div>
            </div>
            <div>
                <div class="padding bg-crypt">
                    <h2>music</h2>
                    <p><em>in order of when I discovered them</em></p>
                    <p>schwarz stein, waterparks, wednesday campanella, bauhaus, crywolf, dir en grey, malice mizer, moi dix mois, my chemial romance, kamelot, kanon wakeshima, emilie autumn, nightwish, the used</p>
                </div>
            </div>
            <div>
                <div class="padding bg-ghost text-bruised">
                    <h2>games</h2>
                    <p>currently playing: hollow knight</p>
                    <p>acww, acnl, acnh, splatoon 3, dragon age origins, oblivion, kingdom death simulator</p>
                </div>
            </div>
            <div>
                <div class="padding bg-kuromi text-bruised">
                    <h2>let's chat!</h2>
                    <ul>
                        <li>email: <a href="mailto:cashmerecrypt@pm.me" class="text-bruised">cashmerecrypt@pm.me</a></li>
                        <li>neopets: <a href="https://www.neopets.com/userlookup.phtml?user=cashmere_crypt" class="text-bruised" target="_blank">cashmere_crypt</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="padding bg-crypt">
            <h2>quiz results</h2>
            <hr>
            <br>
            <b>I Am A:</b> True Neutral Elf Wizard (5th Level)
            <br><br><u>Ability Scores:</u><br>
            <b>Strength-</b>9<br>
            <b>Dexterity-</b>6<br>
            <b>Constitution-</b>10<br>
            <b>Intelligence-</b>16<br>
            <b>Wisdom-</b>15<br>
            <b>Charisma-</b>14
            <br><br><u>Alignment:</u><br><b>True Neutral</b> A true neutral character does what seems to be a good idea. He doesn't feel strongly one way or the other when it comes to good vs. evil or law vs. chaos. Most true neutral characters exhibit a lack of conviction or bias rather than a commitment to neutrality. Such a character thinks of good as better than evil after all, he would rather have good neighbors and rulers than evil ones. Still, he's not personally committed to upholding good in any abstract or universal way. Some true neutral characters, on the other hand, commit themselves philosophically to neutrality. They see good, evil, law, and chaos as prejudices and dangerous extremes. They advocate the middle way of neutrality as the best, most balanced road in the long run. True neutral is the best alignment you can be because it means you act naturally, without prejudice or compulsion. However, true neutral can be a dangerous alignment when it represents apathy, indifference, and a lack of conviction.<br>
            <br><u>Race:</u><br><b>Elves</b> are known for their poetry, song, and magical arts, but when danger threatens they show great skill with weapons and strategy. Elves can live to be over 700 years old and, by human standards, are slow to make friends and enemies, and even slower to forget them. Elves are slim and stand 4.5 to 5.5 feet tall. They have no facial or body hair, prefer comfortable clothes, and possess unearthly grace. Many others races find them hauntingly beautiful.
            <br><br><u>Class:</u><br><b>Wizards</b> are arcane spellcasters who depend on intensive study to create their magic. To wizards, magic is not a talent but a difficult, rewarding art. When they are prepared for battle, wizards can use their spells to devastating effect. When caught by surprise, they are vulnerable. The wizard's strength is her spells, everything else is secondary. She learns new spells as she experiments and grows in experience, and she can also learn them from other wizards. In addition, over time a wizard learns to manipulate her spells so they go farther, work better, or are improved in some other way. A wizard can call a familiar- a small, magical, animal companion that serves her. With a high Intelligence, wizards are capable of casting very high levels of spells.
            <br><br>Find out <a href='http://www.easydamus.com/character.html' target='mt'>What Kind of Dungeons and Dragons Character Would You Be?</a>, courtesy of Easydamus <a href='mailto:zybstrski@excite.com'>(e-mail)</a>
        </div>
    </div>


<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>