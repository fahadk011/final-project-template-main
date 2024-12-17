<div class="grid-card">
    <i class="fa-solid fa-briefcase"></i>
    <span><?php echo $experience->getTitle(); ?></span>
    <h3><?php echo $experience->getDesignation(); ?></h3>
    <p><strong>Location:</strong> New York, NY <br>
    <strong>Duration:</strong> 
    <?php 
        $join = $experience->getDateJoin()->format('F Y');
        $leave = null === $experience->getDateLeave() ? "" : $experience->getDateLeave()->format('F Y');
        echo "$join - $leave";
    ?>
    </p>
    <p>
        <?php echo $experience->getDescription(); ?>
    </p>
</div>