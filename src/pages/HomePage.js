import styles from "../styles/pages/Home.module.scss";
import Header from "../components/layout/Header";
import RoundedButton from "../components/pures/RoundedButton";

const HomePage = () => {
  return (
    <>
      <Header />
      <main className={styles.main}>
        <section className={styles.hero}>
          <div className={styles.heroContent}>
            <div className={styles.heroText}>
              <h1 className={styles.heroTitle}>
                Bienvenue sur <span className={styles.highlight}>Lostaria</span>
              </h1>
              <p className={styles.heroDescription}>
                D'origine une communauté de guildes du serveur Epicube, Lostaria
                recrée les jeux qui nous ont rassemblés dans une ambiance
                amicale et de détente.
              </p>
              <div className={styles.heroButtons}>
                <RoundedButton>
                  <span className={styles.buttonIcon}>⚡</span>
                  Rejoindre le serveur
                </RoundedButton>
                <RoundedButton secondary>Découvrir les modes</RoundedButton>
              </div>
              <div className={styles.serverInfo}>
                <div className={styles.infoItem}>
                  <span className={styles.infoValue}>156</span>
                  <span className={styles.infoLabel}>Joueurs en ligne</span>
                </div>
                <div className={styles.infoDivider}></div>
                <div className={styles.infoItem}>
                  <span className={styles.infoValue}>play.lostaria.fr</span>
                  <span className={styles.infoLabel}>Adresse du serveur</span>
                </div>
              </div>
            </div>
            <div className={styles.heroVisual}>
              <div className={styles.floatingCube}></div>
              <div className={styles.floatingCube}></div>
              <div className={styles.floatingCube}></div>
            </div>
          </div>
        </section>

        {/* Features Section */}
        <section className={styles.features}>
          <div className={styles.container}>
            <h2 className={styles.sectionTitle}>
              Pourquoi choisir notre serveur ?
            </h2>
            <div className={styles.featuresGrid}>
              <div className={styles.featureCard}>
                <div className={styles.featureIcon}>🏰</div>
                <h3 className={styles.featureTitle}>Monde Survie</h3>
                <p className={styles.featureDescription}>
                  Explorez un monde immense avec des défis uniques et des
                  constructions épiques.
                </p>
              </div>
              <div className={styles.featureCard}>
                <div className={styles.featureIcon}>⚔️</div>
                <h3 className={styles.featureTitle}>PvP & Factions</h3>
                <p className={styles.featureDescription}>
                  Affrontez d'autres joueurs et créez votre propre faction pour
                  dominer le serveur.
                </p>
              </div>
              <div className={styles.featureCard}>
                <div className={styles.featureIcon}>🎯</div>
                <h3 className={styles.featureTitle}>Mini-Jeux</h3>
                <p className={styles.featureDescription}>
                  Participez à des mini-jeux exclusifs et gagnez des récompenses
                  exceptionnelles.
                </p>
              </div>
              <div className={styles.featureCard}>
                <div className={styles.featureIcon}>💎</div>
                <h3 className={styles.featureTitle}>Économie</h3>
                <p className={styles.featureDescription}>
                  Développez votre richesse grâce à un système d'économie
                  équilibré et amusant.
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* Team Section */}
        <section className={styles.team}>
          <div className={styles.container}>
            <h2 className={styles.sectionTitle}>Rencontrez notre équipe</h2>
            <p className={styles.teamSubtitle}>
              Des passionnés qui donnent vie à votre expérience de jeu
            </p>
            <div className={styles.teamGrid}>
              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>W</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>Worsewarn</h3>
                  <p className={styles.teamRole}>Développeur & Sys admin</p>
                  <p className={styles.teamDescription}>
                    Entre les rues parisiennes et les parties endiablées de Dead
                    by Daylight, Worsewarn maintient nos serveurs avec la
                    précision d'un chirurgien et l'agilité d'un survivant.
                  </p>
                  <p className={styles.teamQuote}>"C'est pas mon problème !"</p>
                </div>
              </div>

              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>E</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>Erpriex</h3>
                  <p className={styles.teamRole}>Développeur & Sys admin</p>
                  <p className={styles.teamDescription}>
                    Armé de son MacBook et de sa passion pour l'écosystème
                    Apple, Erpriex code avec l'élégance d'un design Cupertino et
                    la fiabilité d'un système Unix.
                  </p>
                  <p className={styles.teamQuote}>"Je commande BK ou pas ?"</p>
                </div>
              </div>

              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>X</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>XEL0</h3>
                  <p className={styles.teamRole}>Constructeur & Développeur</p>
                  <p className={styles.teamDescription}>
                    Avec la précision belge légendaire et une passion pour les
                    gaufres autant que pour les pixels, XEL0 sculpte chaque
                    construction comme une œuvre d'art architectural.
                  </p>
                  <p className={styles.teamQuote}>"Bonsoir maman !"</p>
                </div>
              </div>

              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>L</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>Lycheesis</h3>
                  <p className={styles.teamRole}>Constructeur</p>
                  <p className={styles.teamDescription}>
                    Maître des arts mystiques et des enchantements, Lycheesis
                    transforme chaque build en un royaume féerique où la magie
                    opère à chaque coin de rue.
                  </p>
                  <p className={styles.teamQuote}>"zutouille"</p>
                </div>
              </div>

              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>L</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>lumin0u</h3>
                  <p className={styles.teamRole}>Développeur</p>
                  <p className={styles.teamDescription}>
                    Entre deux verres et une soirée entre amis, lumin0u illumine
                    notre code avec la même énergie festive qu'il apporte à nos
                    longues nuits de développement.
                  </p>
                  <p className={styles.teamQuote}>"Normalement c'est fix !"</p>
                </div>
              </div>

              <div className={styles.teamCard}>
                <div className={styles.teamAvatar}>
                  <span className={styles.avatarInitial}>L</span>
                </div>
                <div className={styles.teamInfo}>
                  <h3 className={styles.teamName}>Lumaly</h3>
                  <p className={styles.teamRole}>Responsable évènements</p>
                  <p className={styles.teamDescription}>
                    Toujours une blague dans la poche et un sourire contagieux,
                    Lumaly organise nos événements comme un chef d'orchestre de
                    la bonne humeur.
                  </p>
                  <p className={styles.teamQuote}>"Je voir ma voisine !"</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Stats Section */}
        <section className={styles.stats}>
          <div className={styles.container}>
            <div className={styles.statsGrid}>
              <div className={styles.statItem}>
                <div className={styles.statNumber}>2,547</div>
                <div className={styles.statLabel}>Joueurs inscrits</div>
              </div>
              <div className={styles.statItem}>
                <div className={styles.statNumber}>24/7</div>
                <div className={styles.statLabel}>Serveur en ligne</div>
              </div>
              <div className={styles.statItem}>
                <div className={styles.statNumber}>15+</div>
                <div className={styles.statLabel}>Modes de jeu</div>
              </div>
              <div className={styles.statItem}>
                <div className={styles.statNumber}>99.9%</div>
                <div className={styles.statLabel}>Disponibilité</div>
              </div>
            </div>
          </div>
        </section>

        {/* CTA Section */}
        <section className={styles.cta}>
          <div className={styles.container}>
            <div className={styles.ctaContent}>
              <h2 className={styles.ctaTitle}>Prêt à commencer l'aventure ?</h2>
              <p className={styles.ctaDescription}>
                Rejoignez des milliers de joueurs et découvrez une expérience
                Minecraft unique.
              </p>
              <button className={styles.ctaButton}>
                <span className={styles.buttonIcon}>🚀</span>
                Commencer maintenant
              </button>
            </div>
          </div>
        </section>

        {/* Thanks Section */}
        <section className={styles.thanks}>
          <div className={styles.container}>
            <h2 className={styles.sectionTitle}>Remerciements</h2>
            <p className={styles.thanksSubtitle}>
              Un grand merci à tous ceux qui ont contribué à faire de ce serveur
              une réalité
            </p>

            <div className={styles.thanksGrid}>
              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🎬</div>
                <h3 className={styles.thanksName}>Lara</h3>
                <p className={styles.thanksContrib}>
                  Chaîne YouTube, concepts & réalisations du hub
                </p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🗺️</div>
                <h3 className={styles.thanksName}>Vulqa</h3>
                <p className={styles.thanksContrib}>Maps de Blocaste</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🐉</div>
                <h3 className={styles.thanksName}>Detragone</h3>
                <p className={styles.thanksContrib}>Création de maps</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🏆</div>
                <h3 className={styles.thanksName}>Detalac</h3>
                <p className={styles.thanksContrib}>
                  Maps & organisation de tournois
                </p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>⚔️</div>
                <h3 className={styles.thanksName}>Boldouille</h3>
                <p className={styles.thanksContrib}>Création de maps</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🌟</div>
                <h3 className={styles.thanksName}>Strynet</h3>
                <p className={styles.thanksContrib}>Création de maps</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>👹</div>
                <h3 className={styles.thanksName}>Karamon</h3>
                <p className={styles.thanksContrib}>Création de maps</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🌊</div>
                <h3 className={styles.thanksName}>HugoKenoa</h3>
                <p className={styles.thanksContrib}>Création de maps</p>
              </div>

              <div className={styles.thanksCard}>
                <div className={styles.thanksIcon}>🧴</div>
                <h3 className={styles.thanksName}>Napouille</h3>
                <p className={styles.thanksContrib}>Pour ton shampooing</p>
              </div>
            </div>

            <div className={styles.thanksFooter}>
              <p className={styles.thanksFooterText}>
                Sans votre passion et votre dévouement, rien de tout cela
                n'aurait été possible. Merci du fond du cœur ! ❤️
              </p>
            </div>
          </div>
        </section>
      </main>
    </>
  );
};

export default HomePage;
