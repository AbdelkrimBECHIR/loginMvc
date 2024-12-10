<?php


?>



    <div style="margin-right: 300px;" class="content-wrapper">
        <h1>Gestion des utilisateurs</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <form action="/admin/update" method="POST">
                            <td>
                                <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                            </td>
                            <td>
                                <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>" required>
                            </td>
                            <td>
                                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                            </td>
                            <td>
                                <select name="role">
                                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>Utilisateur</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?= $user['idUser'] ?>">
                                <button type="submit" class="btn">Modifier</button>
                            </td>
                        </form>
                        <td>
                            <form action="/admin/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $user['idUser'] ?>">
                                <button type="submit" class="btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



