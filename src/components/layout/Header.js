import styles from "../../styles/components/Header.module.scss";
import logoImg from "../../assets/img/logo.png";

const Header = () => {
  return (
    <header className={styles.header}>
      <div className={styles.container}>
        <div className={styles.logo}>
          <img src={logoImg} alt="Logo" className={styles.logoImg} />
        </div>

        <nav className={styles.nav}>
          <ul className={styles.navList}>
            <li className={styles.navItem}>
              <a href="#accueil" className={styles.navLink}>
                Accueil
              </a>
            </li>
            <li className={styles.navItem}>
              <a href="#serveur" className={styles.navLink}>
                Le Serveur
              </a>
            </li>
            <li className={styles.navItem}>
              <a href="#boutique" className={styles.navLink}>
                Boutique
              </a>
            </li>
            <li className={styles.navItem}>
              <a href="#communaute" className={styles.navLink}>
                Communauté
              </a>
            </li>
            <li className={styles.navItem}>
              <a href="#contact" className={styles.navLink}>
                Contact
              </a>
            </li>
          </ul>
        </nav>

        <div className={styles.actions}>
          <button className={styles.playButton}>
            <span className={styles.playIcon}>▶</span>
            Jouer maintenant
          </button>
        </div>

        <button className={styles.mobileMenu}>
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </header>
  );
};

export default Header;
