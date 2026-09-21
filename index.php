<?php

$siteName = "Climate Change Club";
$pageTitle = "Climate Change Club | Student-led action for a healthier future";
$pageDescription = "Discover student-led climate projects, practical ways to help, community updates, and learning resources from Climate Change Club.";

include "includes/header.php";
include "includes/database.php";

$moneyGoal = 5000;
$treeGoal = 500;
$totalMoney = 0.0;
$totalTrees = 0;

if ($dbAvailable) {
    $impact = $conn->query("SELECT COALESCE(SUM(amount), 0) AS totalMoney, COALESCE(SUM(trees), 0) AS totalTrees FROM donations");
    if ($impact) {
        $impactData = $impact->fetch_assoc() ?? [];
        $totalMoney = max(0, (float) ($impactData["totalMoney"] ?? 0));
        $totalTrees = max(0, (int) ($impactData["totalTrees"] ?? 0));
    }
}

$moneyPercent = min(100, round(($totalMoney / $moneyGoal) * 100));
$treePercent = min(100, round(($totalTrees / $treeGoal) * 100));
?>

<main id="main-content" class="site-home">
    <section class="home-hero v5-hero" aria-labelledby="home-title">
        <div class="v5-hero-copy reveal-on-scroll">
            <p class="eyebrow"><i class="fas fa-sparkles" aria-hidden="true"></i> Student-led climate action</p>
            <h1 id="home-title">Climate action, <span>made local.</span></h1>
            <p class="hero-lede">Climate Change Club helps students turn concern into projects, shared learning, and meaningful progress close to home.</p>
            <div class="hero-actions">
                <a class="btn-primary" href="projects.php"><i class="fas fa-seedling" aria-hidden="true"></i> Explore projects</a>
                <a class="btn-secondary" href="reasons.php">Why it matters <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <dl class="hero-trust-list" aria-label="Club focus areas">
                <div><dt>Learn</dt><dd>Clear climate context</dd></div>
                <div><dt>Act</dt><dd>Local projects to join</dd></div>
                <div><dt>Connect</dt><dd>A welcoming community</dd></div>
            </dl>
        </div>

        <aside class="hero-impact-card reveal-on-scroll" aria-label="Tree planting initiative">
            <div class="hero-impact-topline"><span>Seasonal focus</span><i class="fas fa-leaf" aria-hidden="true"></i></div>
            <h2>Planting roots for a healthier future</h2>
            <p>Our summer lemonade stand will help fund tree planting and student climate education.</p>
            <div class="impact-meter">
                <div class="impact-meter-label"><span>Tree goal</span><strong><?php echo $treePercent; ?>%</strong></div>
                <div class="progress-container" role="progressbar" aria-label="Tree planting goal progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $treePercent; ?>"><div class="progress-bar" style="width: <?php echo $treePercent; ?>%"></div></div>
                <small><?php echo number_format($totalTrees); ?> of <?php echo number_format($treeGoal); ?> trees funded</small>
            </div>
            <a href="projects.php" class="text-link">See the initiative <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </aside>
    </section>

    <section id="take-action" class="action-planner reveal-on-scroll" aria-labelledby="action-title">
        <div class="section-intro">
            <p class="eyebrow">Choose a starting point</p>
            <h2 id="action-title">Find your way into the work</h2>
            <p>Choose the path that feels useful right now. No expertise required.</p>
        </div>
        <div class="action-planner-grid">
            <div class="action-choice-list" role="tablist" aria-label="Choose an action path">
                <button class="action-choice is-selected" type="button" role="tab" aria-selected="true" aria-controls="action-project" id="tab-project" data-action-choice="project">
                    <i class="fas fa-people-group" aria-hidden="true"></i><span><strong>Join a project</strong><small>Help make a visible local difference.</small></span><i class="fas fa-arrow-right" aria-hidden="true"></i>
                </button>
                <button class="action-choice" type="button" role="tab" aria-selected="false" aria-controls="action-learn" id="tab-learn" data-action-choice="learn">
                    <i class="fas fa-book-open" aria-hidden="true"></i><span><strong>Build knowledge</strong><small>Find a topic, video, or article to explore.</small></span><i class="fas fa-arrow-right" aria-hidden="true"></i>
                </button>
                <button class="action-choice" type="button" role="tab" aria-selected="false" aria-controls="action-share" id="tab-share" data-action-choice="share">
                    <i class="fas fa-bullhorn" aria-hidden="true"></i><span><strong>Spread the word</strong><small>Bring a friend, idea, or question to the club.</small></span><i class="fas fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>

            <article class="action-result" id="action-project" role="tabpanel" aria-labelledby="tab-project" data-action-panel="project">
                <span class="result-number">01</span>
                <h3>Start where your energy is</h3>
                <p>Explore tree planting, recycling, and student-led sustainability work. Start with a project you would be excited to support.</p>
                <a class="btn-primary" href="projects.php">View active projects</a>
            </article>
            <article class="action-result" id="action-learn" role="tabpanel" aria-labelledby="tab-learn" data-action-panel="learn" hidden>
                <span class="result-number">02</span>
                <h3>Learn one thing worth sharing</h3>
                <p>Find one useful idea in the video hub or Climate Chronicle, then share it with someone you know.</p>
                <a class="btn-primary" href="watch.php">Open the video hub</a>
            </article>
            <article class="action-result" id="action-share" role="tabpanel" aria-labelledby="tab-share" data-action-panel="share" hidden>
                <span class="result-number">03</span>
                <h3>Turn one conversation into momentum</h3>
                <p>Bring a project idea, ask about the next meeting, or invite someone who cares about the same issue.</p>
                <a class="btn-primary" href="contact.php">Send the club a message</a>
            </article>
        </div>
    </section>

    <section class="home-focus-grid" aria-labelledby="focus-title">
        <article class="focus-story reveal-on-scroll">
            <div>
                <p class="eyebrow">What we are working on</p>
                <h2 id="focus-title">A summer of local action</h2>
                <p>We are building toward a lemonade stand that supports tree planting and climate education. It is a simple project with room for many kinds of help.</p>
                <ul class="check-list">
                    <li><i class="fas fa-check" aria-hidden="true"></i> Fund trees and student climate learning</li>
                    <li><i class="fas fa-check" aria-hidden="true"></i> Create a welcoming way to join in</li>
                    <li><i class="fas fa-check" aria-hidden="true"></i> Share progress as the project grows</li>
                </ul>
                <a class="text-link" href="notices.php">Read the latest club updates <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <figure class="focus-poster">
                <img src="images/Summer%20Climate%20Change%20Club%20Tree%20Planting%20Poster%202026.png" alt="Climate Change Club summer tree planting poster" loading="lazy">
            </figure>
        </article>

        <aside class="impact-summary reveal-on-scroll" aria-labelledby="impact-title">
            <p class="eyebrow">Community progress</p>
            <h2 id="impact-title">A goal you can see</h2>
            <div class="impact-stat">
                <div class="impact-icon trees"><i class="fas fa-tree" aria-hidden="true"></i></div>
                <div><span>Trees funded</span><strong><?php echo number_format($totalTrees); ?><small> / <?php echo number_format($treeGoal); ?></small></strong></div>
            </div>
            <div class="impact-stat">
                <div class="impact-icon funding"><i class="fas fa-hand-holding-heart" aria-hidden="true"></i></div>
                <div><span>Funds raised</span><strong>$<?php echo number_format($totalMoney, 0); ?><small> / $<?php echo number_format($moneyGoal, 0); ?></small></strong></div>
            </div>
            <div class="impact-meter compact">
                <div class="impact-meter-label"><span>Fundraising goal</span><strong><?php echo $moneyPercent; ?>%</strong></div>
                <div class="progress-container" role="progressbar" aria-label="Fundraising goal progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $moneyPercent; ?>"><div class="progress-bar" style="width: <?php echo $moneyPercent; ?>%"></div></div>
            </div>
            <?php if (!$dbAvailable): ?><p class="data-note"><i class="fas fa-circle-info" aria-hidden="true"></i> Progress updates will appear when the community tracker is connected.</p><?php endif; ?>
            <button class="btn-secondary" type="button" data-open-donate><i class="fas fa-heart" aria-hidden="true"></i> Support the goal</button>
        </aside>
    </section>

    <section class="explore-section reveal-on-scroll" aria-labelledby="explore-title">
        <div class="section-intro section-intro-inline">
            <div><p class="eyebrow">Keep exploring</p><h2 id="explore-title">More ways to connect</h2></div>
            <a class="text-link" href="about.php">About the club <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="explore-grid">
            <a class="explore-card" href="watch.php"><i class="fas fa-circle-play" aria-hidden="true"></i><h3>Watch & learn</h3><p>Find club videos and climate explainers.</p><span>Open Watch <i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
            <a class="explore-card" href="articles.php"><i class="fas fa-newspaper" aria-hidden="true"></i><h3>Read stories</h3><p>Discover student perspectives and practical ideas.</p><span>Read articles <i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
            <a class="explore-card" href="meetings.php"><i class="fas fa-calendar-days" aria-hidden="true"></i><h3>Meet the community</h3><p>Bring an idea to a workshop or club meeting.</p><span>See meetings <i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
        </div>
    </section>

    <section class="newsletter-section home-newsletter reveal-on-scroll" aria-labelledby="newsletter-title">
        <div>
            <p class="eyebrow">Stay in the loop</p>
            <h2 id="newsletter-title">Get the next action in your inbox</h2>
            <p>Project news, learning resources, and ways to join in — sent when there is something useful to share.</p>
        </div>
        <div class="newsletter-portal">
            <a href="https://forms.gle/8BBaZFaykad2XnYF9" target="_blank" rel="noopener" data-url="https://forms.gle/8BBaZFaykad2XnYF9" class="btn-primary btn-large" id="confettiTrigger">Join the mailing list <i class="fas fa-paper-plane" aria-hidden="true"></i></a>
            <p class="privacy-note">Action-focused. No advertising.</p>
        </div>
    </section>
</main>

<?php include "includes/footer.php"; ?>
