$final = $db->getCurrentSampleTransactionfinal($db, $db->con, $user_id, $_SESSION['month'], $year);

if ($final) {
    foreach ($final as $row): ?>
        <tr>
            <td><?php echo $row['sample_id']; ?></td>
            <td><?php echo htmlspecialchars($row['sample_name']); ?></td>
            <td><?php echo number_format($row['qua_nonreg'], 2); ?></td>
            <td><?php echo number_format($row['eco_nonreg'], 2); ?></td>
            <td><?php echo number_format($row['qua_reg'], 2); ?></td>
            <td><?php echo number_format($row['eco_reg'], 2); ?></td>
            <td><?php echo number_format($row['total'], 2); ?></td>
        </tr>
    <?php endforeach;
} else {
    // In case $final is empty or false, show a message
    echo "<tr><td colspan='7'>No data available</td></tr>";
}
